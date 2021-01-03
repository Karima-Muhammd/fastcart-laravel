<?php

namespace App\Http\Controllers\Api;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class BranchApiController extends Controller
{
    use GeneralTrait;
    public function show($id)
    {
        $branch=Branch::find($id);
        if($branch)
            return $this->returnData("Successfully Return Branch Number $branch->name" ,'Branch',$branch);
        return $this->returnError('Branch Not Found');
    }
    public function index()
    {
        $branches=Branch::all();
        if($branches)
            return $this->returnData("Successfully Return All Branches" ,'Branches',$branches);
        return $this->returnError('Branches Not Found');
    }
    public function store(Request $request)
    {
        $request->validate([
            'country'=>'required|string',
            'city'=>'required|string',
            'area'=>'required|string',
            'street'=>'required|string',
        ]);
        Branch::create($request->all());
        return  $this->returnSuccess('Added Branch Successfully');
    }
    public function update(Request $request,$id)
    {
        $branch=Branch::find($id);
        if($branch)
        {
            $validator=Validator::make($request->all(),[
            'country'=>'string',
            'city'=>'string',
            'area'=>'string',
            'street'=>'string',
            ]);
            if($validator->fails())
            {
                return response()->json([
                    'errors'=>$validator->errors()
                ]);
            }
            $branch->update($request->all());
            return  $this->returnData('Branch Updated Successfully','updated Branch',$branch);
        }
        else
            return $this->returnError('Branch Not Found');
    }

}
