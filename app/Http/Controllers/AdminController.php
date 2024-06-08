<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Service;
use App\Models\AdminLogs;
use App\Models\Transaction;
use App\Models\Announcement;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\CategorySwitch;
use App\Models\Product;
use App\Models\Report;
use App\Models\Review;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function showLoginForm()
    {
        return view('admin.signin');
    }

    public function login(Request $request)
    {
        // Validation logic here
        if (Auth::guard('admin')->attempt($request->only('username', 'password'))) {
            $admin = Auth::guard('admin')->user();
            // dd($admin->status);
            if ($admin->status == 'Active')
            {
                $userLog = AdminLogs::create([ 
                    'adminID' => $admin->id,
                    'username' => $request->username,
                    'IPAddress' => $_SERVER['REMOTE_ADDR'],
                    'status' => 'Signed-In',
                ]);
                
                if(isset($admin->businessID))
                {
                    return redirect()->route('admin.dashboard')->with('message', 'Signed In successsfully');
                }
                return redirect()->route('admin.company')->with('message', 'Signed In successsfully');
            }
            else
            {
                return redirect()->route('admin.signin')->with('message', 'You are not active');
            }
        }
        // Handle failed login
        return redirect()->back()->withInput()->withErrors(['username' => 'Invalid credentials']);
    }

    public function redirectTo()
    {
        if(Auth::guard('admin')->check())
        {
            return '/admin/dashboard';
        }

        return '/admin/signin';
    }

    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        // Create a new user
        $admin = Admin::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
            'status' => 'Active',
            'password' => bcrypt($request->input('password')),
        ]);

        
        // Redirect to the user dashboard
        return redirect()->route('admin.signin');
    }

    public function dashboard()
    {
        $adminsCount = Admin::whereNotNull('status')->get()->count();
        $usersCount = User::whereNotNull('status')->get()->count();
        $suppliersCount = Supplier::whereNotNull('status')->get()->count();
        $ordersCount = Order::whereNotNull('status')->get()->count();
        $paymentsCount = Payment::whereNotNull('status')->get()->count();
        $productsCount = Product::whereNotNull('status')->get()->count();
        $reviewsCount = Review::whereNotNull('status')->get()->count();
        $reportsCount = Report::whereNotNull('status')->get()->count();
        // return view('admin.dashboard');
        return view('admin.dashboard', compact(
            'adminsCount', 'usersCount', 'suppliersCount', 'ordersCount', 'paymentsCount', 'productsCount', 
            'reviewsCount',  'reportsCount'
        ));
    }

    public function showAdminLogs(Admin $admin)
    {
        return view('admin.register');
    }

    public function logout()
    {
        
        $adminLog = AdminLogs::create([ 
            'adminID' => auth()->user()->id,
            'username' => auth()->user()->email,
            'IPAddress' => $_SERVER['REMOTE_ADDR'],
            'status' => 'Signed-Out',
        ]);
        Auth::logout();
        return redirect()->route('admin.signin'); // Redirect to the login page after logout
    }

    
    public function showUsers()
    {
        return view('admin.users');
    }

    // public function showSwitches()
    // {
    //     $switches = CategorySwitch::whereNotNull('status')->orderBy('id', 'asc')->get();
    //     return view('admin.others.switches', [
    //         'switches' => $switches,
    //     ]);
    // }

    public function showAnnouncements()
    {
        $announcements = Announcement::whereNotNull('status')->orderBy('id', 'asc')->get();
        return view('admin.others.announcements', [
            'announcements' => $announcements,
        ]);
    }

    public function showAnnouncement(Announcement $announcement)
    {
        return view('admin.others.showAnnouncement', [
            'announcement' => $announcement,
        ]);
    }

    public function editAnnouncement(Announcement $announcement, Request $request)
    {
        // echo $request->id;
        $credentials = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $announcement->update($credentials);
        return redirect()->back()->with('message', 'You successfully updated the announcement');
    }

    public function addAnnouncement(Request $request)
    {
        // echo $request->id;
        $credentials = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $data = Announcement::create([
            "admin_id" => auth()->user()->id,
            "title" => $request->title,
            "body" => $request->body,
            "status" => 'Active',
        ]);

        if($data)
        {
            return redirect()->back()->with('message', 'You successfully added an announcement');
        }
        
        return redirect()->back()->with('message', 'There is an error.Try again');

    }

    // public function updateSwitch(Request $request)
    // {
    //     // echo $request->id;
    //     $credentials = $request->validate([
    //         'id' => 'required',
    //         'biller' => 'required',
    //         'status' => 'required',
    //     ]);

    //     $switch = CategorySwitch::find($request->id); // Assuming you have the $userId variable
    //     if ($switch) {
    //         // Update the switch's record in the switchs table
    //         $switch->update([
    //             $request->biller => $request->status,
    //         ]);
    //         return response()->json(['success' => true, 'message' => 'Switch has been updated!']);
    //         // return redirect()->route('admin.switches')->with('message', 'Service Switch has been updated!');
    //     }else{
    //         // return redirect()->back()->with('message', 'Switch not found');
    //         return response()->json(['success' => false, 'message' => 'Switch not found']);
    //     }
    //     // return redirect()->back()->with('message', 'There is a problem. Try again later');
    //         return response()->json(['success' => false, 'message' => 'There is a problem. Try again later!']);
    // }

}
