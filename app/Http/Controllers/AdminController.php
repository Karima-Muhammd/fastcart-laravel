<?php

namespace App\Http\Controllers;

use App\Package;
use App\Subscriber;
use App\Ticket;
use Carbon\Carbon;
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
    public function un_active($id)
    {
        $subscriber=Subscriber::find($id);
        $package_id=$subscriber->package_id;
        $package=Package::find($package_id);
        $no_orderpermonth=$package->no_orderPerMonth;
        $start_date=Carbon::now();
        $end_date = Carbon::parse($start_date)->addDays($no_orderpermonth);

        if($subscriber->status==0)
        {
            $subscriber->status=1;
            $subscriber->end_date=$end_date;
        }
        elseif($subscriber->status==1)
        {
            $subscriber->status=0;
            $subscriber->end_date=null;
        }
        $subscriber->update();
        return redirect()->back();
    }
}
