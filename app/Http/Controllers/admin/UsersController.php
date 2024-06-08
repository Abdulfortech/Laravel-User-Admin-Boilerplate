<?php

namespace App\Http\Controllers\admin;

use Wallet;
use Carbon\Carbon;
use VirtualAccount;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserLogs;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
       //
       public function index()
       {
           $userCount = User::whereNotNull('status')->get()->count();
           $users = User::whereNotNull('status')->orderBy('id', 'desc')->get();
           return view('admin.users.index', [
               'userCount' => $userCount,
               'users' => $users,
           ]);
       }
   
       public function showUser(Request $request, User $user)
       {
           return view('admin.users.view',['user'=> $user]);
       }

       public function userLogs(Request $request, User $user)
       {
            $logs = UserLogs::where('userID', $user->id)->whereNotNull('status')->get();
           return view('admin.users.logs',['user'=> $user, 'logs' => $logs]);
       }

       public function deleteUser(Request $request, User $user)
       {
           $user->update([
               "status"=> null
           ]);
           if($user)
           {
               return redirect()->route('admin.users')->with('message', 'You successfully delete the user');
           }
           return redirect()->back()->with('message', 'There is an error.Try again');
       }
   
       public function deactivateUser(Request $request, User $user)
       {
           $user->update([
               "status"=> "Inactive"
           ]);
   
           if($user)
           {
               return redirect()->route('admin.users.view',[$user->id])->with('message', 'You successfully deactivate the user');
           }
           return redirect()->back()->with('message', 'There is an error.Try again');
       }
   
       public function activateUser(Request $request, User $user)
       {
           $user->update([
               "status"=> "Active"
           ]);
   
           if($user)
           {
               return redirect()->route('admin.users.view',[$user->id])->with('message', 'You successfully activate the user');
           }
           return redirect()->back()->with('message', 'There is an error.Try again');
       }
}
