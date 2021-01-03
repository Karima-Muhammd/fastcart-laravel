<?php

namespace App\Http\Controllers;

use App\Package;
use App\Subscriber;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers=Subscriber::get();
        return view('admin.subscribers.index',['subscribers'=>$subscribers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:40|string',
            'password'=>'required|min:6',
            'phone'=>'required|numeric|unique:subscribers',
            'email'=>'required|email|unique:subscribers',
            'street'=>'required|string',
            'no_flat'=>'required|numeric',
            'no_flour'=>'required|numeric',
            'package_id'=>'required|numeric',
            'payment_id'=>'required|numeric',
        ]);
        $start_date=Carbon::now();
        $end_date = Carbon::parse($start_date)->addDays($request->end_date);

        Subscriber::create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'email'=>$request->email,
            'street'=>$request->street,
            'no_flat'=>$request->no_flat,
            'no_flour'=>$request->no_flour,
            'package_id'=>$request->package_id,
            'end_date'=>$end_date
        ]);
        return response()->json([
            'success'=>"Successfully Subscribe"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }
    public function Login()
    {
        return view('subscriber.login');
    }
    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:subscribers',
            'password'=>'required|',
        ]);
       $login= Auth::guard('subscriber')->attempt(['email' => $request->email, 'password' => $request->password]);
        if($login)
        {
            $subscribe=Subscriber::where('email','=',$request->email)->first();
            session()->put('subscriber',$subscribe);
            return redirect(route('counter',$subscribe->id));
        }
        else
        {
            return redirect(route('login'))->withErrors([
                'error_key' => "Password isn't match Email"
            ]);
        }

//        if($subscribe && Hash::check($request->password, $subscribe->password))
//        {
//            Auth::login($subscribe);
//            return redirect(route('counter',$subscribe->id));
//        }
//        else
//        {
//            return redirect(route('login'))->withErrors([
//                'error_key' => "Password isn't match Email"]);
//        }

    }
    public function Logout()
    {
        session()->forget('subscriber');
        if(!session()->has('subscriber'))
        {
            return redirect(route('login'));
        }
        return redirect(route('Package.show',1));
    }

    public  function counter($id)
    {

        $subscriber=Subscriber::find($id);
        $to_day=Carbon::now();
        $end_date =$subscriber->end_date;

        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$end_date );
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $to_day);

        $diff = $to->diff($from);
        $days=$diff->days;
        $min=$diff->i;
        $sec=$diff->s;
        $h=$diff->h;
        if($days <= 0 && $h <=0 && $min <=0 && $sec <=0)
            $subscriber->delete();
        return view('subscriber.counter',[
            'end_date'=>$end_date
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $subscribe=Subscriber::find($id);
        $packages=Package::get();
        return view('admin.subscribers.update',[
            'subscriber'=>$subscribe,
            'packages'=>$packages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $subscriber=Subscriber::find($id);
        $request->validate([
                'name'=>'string',
                'phone'=>'numeric|exists:subscribers',
                'email'=>'email|exists:subscribers',
                'street'=>'string',
                'no_flat'=>'numeric',
                'no_flour'=>'numeric',
                'no_build'=>'numeric',
                'package_id'=>'numeric',
                'end_date'=>'date',
            ]);
        $subscriber->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'street'=>$request->street,
                'no_flat'=>$request->no_flat,
                'no_flour'=>$request->no_flour,
                'no_build'=>$request->no_build,
                'package_id'=>$request->package_id,
                'password'=>$subscriber->password,
                'end_date'=>$subscriber->end_date
            ]);
        return response()->json([
            'success'=>"Successfully Subscribe"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber=Subscriber::find($id);
        $subscriber->delete();
        return response()->json([
            'success'=>"Successfully Deleted"
        ]);
    }


}
