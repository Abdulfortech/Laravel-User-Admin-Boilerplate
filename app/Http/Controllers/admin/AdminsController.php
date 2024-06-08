<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    //
    public function index()
    {
        $adminCount = Admin::whereNotNull('status')->get()->count();
        $admins = Admin::whereNotNull('status')->orderBy('id', 'desc')->get();
        // return view('admin.admins', compact('adminCount', 'admins'));
        // dd($adminCount);
        return view('admin.admins.index', [
            'adminCount' => $adminCount,
            'admins' => $admins,
        ]);
    }


    public function showAddAdmin()
    {
        return view('admin.admins.add');
    }

    public function showAdmin(Request $request, Admin $admin)
    {
        return view('admin.admins.view',['admin'=> $admin]);
    }

    public function showEditAdmin(Request $request, Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function addAdmin(Request $request)
    {
        // Validation logic here (you can use Laravel validation)
        $credentials = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required|unique:admins|max:15',
            'role' => 'required',
            'email' => 'nullable',
            'password' => 'required|confirmed|min:8',
        ]);

        $credentials['addedBy'] = auth()->user()->id;
        $credentials['business_id'] = auth()->user()->business->id;
        $credentials['status'] = 'Active';
        $credentials['password'] = bcrypt($credentials['password']);
        // Create a new admin
        $admin = Admin::create($credentials);
        if($admin)
        {
            return redirect()->route('admins')->with('message', 'You successfully add an admin');
        }
        // dd($credentials);
        return redirect()->back()->with('message', 'There is an error.Try again');
    }

    public function editAdmin(Request $request, Admin $admin)
    {
         // Validation logic here (you can use Laravel validation)
         $credentials = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'nullable',
            'password' => 'nullable|confirmed|min:8',
        ]);

        if($request->has('password')){
            $credentials['password'] = bcrypt($credentials['password']);
        }else{
            $credentials['password'] = $admin->password;
        }
        $admin->update($credentials);
        if($admin)
        {
            return redirect()->route('admin.showView',[$admin->id])->with('message', 'You successfully update a admin');
        }
        return redirect()->back()->with('message', 'There is an error.Try again');
    }

    public function deleteAdmin(Request $request, Admin $admin)
    {
        $admin->update([
            "status"=> null
        ]);
        if($admin)
        {
            return redirect()->route('admins')->with('message', 'You successfully delete an admin');
        }
        return redirect()->back()->with('message', 'There is an error.Try again');
    }

    public function deactivateAdmin(Request $request, Admin $admin)
    {
        $admin->update([
            "status"=> "Inactive"
        ]);

        if($admin)
        {
            return redirect()->route('admin.showView',[$admin->id])->with('message', 'You successfully deactivate an admin');
        }
        return redirect()->back()->with('message', 'There is an error.Try again');
    }

    public function activateAdmin(Request $request, Admin $admin)
    {
        $admin->update([
            "status"=> "Active"
        ]);

        if($admin)
        {
            return redirect()->route('admin.showView',[$admin->id])->with('message', 'You successfully activate an admin');
        }
        return redirect()->back()->with('message', 'There is an error.Try again');
    }


}
