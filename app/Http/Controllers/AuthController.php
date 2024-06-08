<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {}

    public function showSignin()
    {
        return view('main.auth.signin');
    }
    
    public function showSignup()
    {
        return view('main.auth.signup');
    }

    public function showForgetPassword()
    {
        return view('auth.forgetPassword');
    }

    public function showResetPassword()
    {
        return view('user.resetPassword');
    }
    
    public function showVerifyPage()
    {
        return view('user.verify');
    }

    public function showProfile()
    {
        return view('user.profile');
    }

    public function signin(Request $request)
    {
        
        // Validation logic here

        if (Auth::guard('web')->attempt($request->only('phone', 'password'))) {
            if(auth()->user()->status == 'Active')
            {
                $userLog = UserLogs::create([ 
                    'userID' => auth()->user()->id,
                    'username' => $request->phone,
                    'IPAddress' => $_SERVER['REMOTE_ADDR'],
                    'status' => 'Signed-In',
                ]);
                return redirect()->route('index');
            }
            else
            {
                $userLog = UserLogs::create([ 
                    'userID' => auth()->user()->id,
                    'username' => $request->phone,
                    'IPAddress' => $_SERVER['REMOTE_ADDR'],
                    'status' => 'Inactive',
                ]);
                // Auth::logout();
                return redirect()->route('auth.login')->with('message', 'Your account is not active.');
            }
        }
            $userLog = UserLogs::create([ 
                'userID' => 0,
                'username' => $request->username,
                'IPAddress' => $_SERVER['REMOTE_ADDR'],
                'status' => 'Failed',
            ]);
        // Handle failed login
        return redirect()->back()->withInput()->withErrors(['phone' => 'Invalid credentials']);
    }

    public function signup(Request $request)
    {
        // Validation logic here (you can use Laravel validation)
        $credentials = $request->validate([
            'firstName' => ['required', 'min:4'],
            'lastName' => ['required', 'min:4'],
            'phone' => 'required|unique:users|min:11|max:15',
            // 'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
        $credentials['status'] = 'Active';
        $credentials['type'] = 'User';
        $credentials['password'] = bcrypt($credentials['password']);
        // dd($credentials);
        // Create a new user
        $user = User::create($credentials);        

        // // Log in the user
        // Auth::login($user);
        // $userLog = UserLogs::create([ 
        //     'userID' => auth()->user()->id,
        //     'username' => $request->username,
        //     'IPAddress' => $_SERVER['REMOTE_ADDR'],
        //     'status' => 'Signed-In',
        // ]);

        // // Redirect to the user dashboard
        return redirect()->route('auth.login')->with('message', 'Your successfully signup.');
    }

    public function forgetPassword(Request $request)
    {
        // Validation logic here

        // Handle failed login
        return redirect('/user/reset-password')->with('message', 'OTP has been sent');
    }

    public function resetPassword(Request $request)
    {
        // Validation logic here

        // Handle failed login
        return redirect()->route('user.login')->with('message', 'Password has been changed');
    }

    public function updateProfile(Request $request)
    {
        // Validation logic here
        $credentials = $request->validate([
            'userId' => ['required'],
            'firstName' => ['required', 'min:4'],
            'lastName' => ['required', 'min:4'],
            'username' => 'required',
            'phone' => 'required|min:11|max:15',
            'email' => 'required|email',
            'dob' => 'required',
            'gender' => 'required',
            'nin' => 'required',
            'bvn' => 'required',
            'state' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($request->userId);
        if ($user && $user->id == auth()->user()->id) {
            $user->update($credentials);
            return redirect()->route('user.profile')->with('message', 'Profile has been updated!');            
        } else {
            // return response()->json(['message' => 'Admin verification failed'], 401);
            return redirect()->back()->with('message', 'User Verification Failed');
        }
        return redirect()->back()->with('message', 'There is an error. Try again');
    }

    public function updatePassword(Request $request)
    {
        $credentials = $request->validate([
            'userId' => ['required'],
            'oldPassword' => 'required|min:8',
            'password' => 'required|confirmed|min:8',
        ]);
        $user = User::find($request->userId);
        // If user is verified, compare hashed passwords
        if ($user && Hash::check($request->input('oldPassword'), $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('user.profile')->with('message', 'Password has been updated!');            
        } else {
            // return response()->json(['message' => 'Admin verification failed'], 401);
            return redirect()->back()->with('message', 'User Verification Failed');
        }
        return redirect()->back()->with('message', 'There is an error. Try again');
    }

    public function signout()
    {
        $userLog = UserLogs::create([ 
            'userID' => auth()->user()->id,
            'username' =>  auth()->user()->phone,
            'IPAddress' => $_SERVER['REMOTE_ADDR'],
            'status' => 'Signed-Out',
        ]);
        Auth::logout();
        return redirect()->route('auth.login'); // Redirect to the login page after logout
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

}
