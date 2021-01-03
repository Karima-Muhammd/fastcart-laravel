<?php

namespace App\Http\Controllers;

use App\Package;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function package_index()
    {
        $packages=Package::get();
        return view('admin.packages.index',['packages'=>$packages]);
    }
    public function ticket_index()
    {
        $tickets=Ticket::get();
        return view('admin.tickets.index',['tickets'=>$tickets]);
    }
    public function login_admin()
    {
        return view('admin.login');
    }
    public function do_login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|max:100|exists:App\User,email',
            'password'=>'required|min:6'
        ]);
        Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            return redirect(route('admin_index'));
        else
        {
            return redirect(route('Admin.Login'))->withErrors([
                'error_key' => "Password isn't match Email"
            ]);
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect(route('Admin.Login'));
    }
}
