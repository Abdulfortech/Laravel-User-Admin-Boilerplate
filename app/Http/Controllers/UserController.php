<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\UserLogs;
use App\Models\Referrals;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\VirtualAccount;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon; // Import the Carbon library

class UserController extends Controller
{
    //
    public function index()
    {
        return view('main.user.dashboard');
    }

    public function myAccount()
    {
        return view('main.user.account');
    }

    public function myOrders()
    {
        $orders = Order::where('userID', auth()->user()->id)->where('status', 'Active')->orderBy('id','desc')->get();
        return view('main.user.orders', compact('orders'));
    }

    public function myReviews()
    {
        $reviews = Review::where('userID', auth()->user()->id)->where('status', 'Active')->orderBy('id','desc')->get();
        return view('main.user.reviews', compact('reviews'));
    }

    public function showProfile()
    {
        return view('main.user.profile');
    }

    public function showEditProfile()
    {
        return view('main.user.profileEdit');
    }

    public function updateProfile(Request $request)
    {
        // Validation logic here
        $credentials = $request->validate([
            'userID' => 'required',
            'firstName' => ['required', 'min:4'],
            'lastName' => ['required', 'min:4'],
            'dob' => 'required',
            'gender' => 'required',
            'idType' => 'required',
            'idNumber' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($request->userID);
        if ($user && $user->id == auth()->user()->id) {
            $user->update($credentials);
            return redirect()->route('user.showProfile')->with('message', 'Profile has been updated!');            
        } else {
            // return response()->json(['message' => 'Admin verification failed'], 401);
            return redirect()->back()->with('message', 'User Verification Failed');
        }
        return redirect()->back()->with('message', 'There is an error. Try again');
    }

    public function showEditPassword()
    {
        return view('main.user.passwordEdit');
    }

    public function updatePassword(Request $request)
    {
        $credentials = $request->validate([
            'userID' => ['required'],
            'oldPassword' => 'required|min:8',
            'password' => 'required|confirmed|min:8',
        ]);
        $user = User::find($request->userID);
        // If user is verified, compare hashed passwords
        if ($user && Hash::check($request->input('oldPassword'), $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('user.editPassword')->with('message', 'Password has been updated!');            
        } else {
            // return response()->json(['message' => 'Admin verification failed'], 401);
            return redirect()->back()->with('message', 'Your current password does not match');
        }
        return redirect()->back()->with('message', 'There is an error. Try again');
    }

    public function logs()
    {
        $logs = UserLogs::where('userID', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('main.user.logs', compact('logs'));
    }

    public function generateRandomCode()
    {
        $randomBytes = random_bytes(10); // Generates 10 random bytes
        $code = bin2hex($randomBytes); // Convert the bytes to hexadecimal representation
        return $code;
    }

    public function generateRandomNumbers()
    {
        $min = 100000; // Minimum 6-digit number
        $max = 999999; // Maximum 6-digit number
        // Generate a random number within the specified range
        $randomNumber = rand($min, $max);
        return $randomNumber;
    }

    public function sendVerificationCode(Request $request)
    {
        $code = $this->generateRandomNumbers();
        // Save the verification code to the user model
        $user = User::find($request->userId);
        $user->verification_code = $code;
        $user->generated_at = Carbon::now();
        if($user->save())
        {
            $sendToPhone = $this->sendOTPToPhone($request->phoneContact, $code); 
            $sendToEmail = $this->sendOTPToEmail($request->emailContact, $code, auth()->user()->firstName); 
            if ($sendToPhone || $sendToEmail) {
                return response()->json(['success' => true, 'message' => 'OTP has been sent']);
            }else{
                return response()->json(['errors' => 'Try Again later'], 422);
            }
            
            return response()->json(['success' => false, 'message' => 'Sorry! There is a problem']);
            
        }
        
        return response()->json(['success' => true, 'message' => 'OTP has been sent']);
        
        // Assuming the OTP was sent successfully

    }

    
    public function sendOTPToEmail($email, $code, $rName)
    {
        $mail = new PHPMailer(true); // true enables exceptions

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mukhtarsani20@gmail.com';
            $mail->Password   = 'gdfihtwkszggagep';
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port       = 587;

            // Sender and recipient settings
            $mail->setFrom('info@aarashiddata.com', 'AA Rasheed Data');
            $mail->addAddress($email, $rName);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Verify your Account';
            $mail->Body    = '<p>Hello, this is your OTP to verify your account : </p>'. $code;

            $mail->send();
            return "Email sent successfully!";
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendOTPToPhone($phone, $code)
    {
        $message = "Your One-Time Passowrd for verifying your account is" . $code;
        $headers = array('Content-Type: application/x-www-form-urlencoded');
        $url = 'https://www.bulksmsnigeria.com/api/v1/sms/create';
        $arr_params = [
            'from'      =>  'AARasheedDa',
            'to'          =>  $phone,
            'body'      =>  $message,
            'append_sender' => 3,
            'api_token' =>  'LFKP1OtTZxU6HZdvBWL6obBfWFNf2QyUOm8awvsJv2d9c5eQhIXioKv5KG3Z', //Todo: Replace with your API Token
            'dnd'       =>  4
        ];
        if (is_array($arr_params)) {
            $final_url_data = http_build_query($arr_params, '', '&');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $final_url_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $response = curl_exec($ch);
        curl_close($ch);
        // echo $response;
        $obj = json_decode($response);
        if ($obj->data->status == 'success') {
            return true;
        } else {
            return false;
        }
    }


   
}

