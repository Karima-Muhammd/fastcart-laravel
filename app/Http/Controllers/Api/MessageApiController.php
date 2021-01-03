<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageApiController extends Controller
{
    use GeneralTrait;
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string',
            'message'=>'required|string',
            'phone'=>'required|numeric',
            'email'=>'required|email',
        ]);
        if($validator->fails()) { return response()->json(['errors'=>$validator->errors()]);}
        Message::create($request->all());
        return $this->returnSuccess('Successfully add Issue');
    }
    public function update(Request $request,$id)
    {
        $message=Message::find($id);
        if($message)
        {
            $validator=Validator::make($request->all(),[
            'name'=>'string',
            'message'=>'string',
            'phone'=>'numeric',
            'email'=>'email',]);

            if($validator->fails())
            {
                return response()->json([
                    'errors'=>$validator->errors()
                ]);
            }

                $message->update($request->all());
                return  $this->returnData('Issue Updated Successfully','updated Issue',$message);
            }
        return $this->returnError('Issue not found');

    }
    public function show($id)
    {
        $message=Message::find($id);
        if($message)
            return $this->returnData("Successfully Return Issue Number $message->id" ,'Issue',$message);
        return $this->returnError('Issues not found');
    }
    public function index()
    {
        $messages=Message::all();
        if($messages)
            return $this->returnData("Successfully Return All Issue" ,'Issues',$messages);
        return $this->returnError('Issue not found');

    }

}
