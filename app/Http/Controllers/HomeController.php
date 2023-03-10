<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin'))
        {
            return view('admin/dashboard');
        }
        else if(Auth::user()->hasRole('coordinator'))
        {
            return view('coordinator/dashboard');
        }
        else if(Auth::user()->hasRole('staff'))
        {
            return view('staff/dashboard');
        }
        else if(Auth::user()->hasRole('technical'))
        {
            return view('technical/dashboard');
        }
        else
        {
            return view('/');
        }
    }
    //CHANGE PASSWORD
    public function changePassword()
    {
        return view('update-password');
    }
    //UPDATE PASSWORD
    public function updatePassword(Request $request)
    {
        #Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        #Match the old password
        if(!Hash::check($request->old_password, auth()->user()->password))
        {
            return back()->with("error", "Old Password Doesn't match!");
        }
        #Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password change successfully!");
    }

}
