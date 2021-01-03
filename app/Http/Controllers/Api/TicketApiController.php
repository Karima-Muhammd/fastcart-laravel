<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Package;
use App\Ticket;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketApiController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $tickets=Ticket::all();
        if($tickets)
            return $this->returnData("Successfully Return All Tickets" ,'Tickets',$tickets);
        return $this->returnError('Tickets not found');
    }
    public function show($id)
    {
        $ticket=Ticket::find($id);
        if($ticket)
            return $this->returnData("Successfully Return Ticket Number $ticket->id" ,'Ticket',$ticket);
        return $this->returnError('Ticket not found');
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string',
            'order'=>'required|string',
            'phone'=>'required|numeric',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        }
        Ticket::create($request->all());
        return $this->returnSuccess('Successfully Add new Ticket');
    }
    public function update(Request $request,$id)
    {
        $ticket=Ticket::find($id);
        if($ticket)
        {
            $validator=Validator::make($request->all(),[
                'name'=>'string',
                'order'=>'string',
                'phone'=>'numeric',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'errors'=>$validator->errors()
                ]);
            }

                $ticket->update($request->all());
                return  $this->returnData('Ticket Update Successfully','updated ticket ',$ticket);
        }
        else
            return $this->returnError('Ticket not found');

    }

}
