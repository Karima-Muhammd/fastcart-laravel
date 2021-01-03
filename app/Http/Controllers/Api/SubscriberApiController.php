<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Subscriber;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SubscriberApiController extends Controller
{
    use GeneralTrait;
    public function show($id)
    {
        $subscriber=Subscriber::find($id);
        if($subscriber)
            return $this->returnData("Successfully Return Subscribe Number $subscriber->id" ,'Subscribe',$subscriber);
        return $this->returnError('Subscriber not found');


    }
    public function index()
    {
        $subscribers=Subscriber::all();
        if($subscribers)
            return $this->returnData("Successfully Return All Subscribers" ,'Subscribers',$subscribers);
        return $this->returnError('Subscriber not found');

    }
    public function update(Request $request,$id)
    {
        $subscriber=Subscriber::find($id);
        if($subscriber){
                $validator=Validator::make($request->all(),[
                'name'=>'string',
                'password'=>'required|min:6',
                'phone'=>'required|numeric|unique:subscribers',
                'email'=>'required|email|unique:subscribers',
                'street'=>'required|string',
                'no_flat'=>'required|numeric',
                'no_flour'=>'required|numeric',
                'package_id'=>'required|numeric',
                'payment_id'=>'required|numeric',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'errors'=>$validator->errors()
                ]);
            }
                $subscriber->update([
                    'name'=>$request->name,
                    'password'=>Hash::make($request->password),
                    'phone'=>$request->phone,
                    'email'=>$request->email,
                    'street'=>$request->street,
                    'no_flat'=>$request->no_flat,
                    'no_flour'=>$request->no_flour,
                    'package_id'=>$request->package_id,
                    'payment_id'=>$request->payment_id,
                    'end_date'=>$subscriber->end_date
                ]);
                return  $this->returnData('Subscriber Updated Successfully','updated Subscriber',$subscriber);
        }
        return $this->returnError('Subscriber not found');
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:40|string',
            'password'=>'required|string|min:6',
            'phone'=>'required|numeric|unique:subscribers',
            'email'=>'required|email|unique:subscribers',
            'street'=>'required|string',
            'no_flat'=>'required|numeric',
            'no_flour'=>'required|numeric',
            'package_id'=>'required|numeric',
            'payment_id'=>'required|numeric',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        }
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
            'payment_id'=>$request->payment_id,
            'end_date'=>$end_date

        ]);
        return $this->returnSuccess('Successfully Add New Subscriber');
    }
}
