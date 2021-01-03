<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Package;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class PackageApiController extends Controller
{
    use GeneralTrait;
    public function show($id)
    {
        $package=Package::find($id);
        if($package)
            return $this->returnData("Successfully Return Package Number $package->name" ,'Package',$package);
        return $this->returnError('Package not found');
    }
    public function index()
    {
        $packages=Package::all();
        if($packages)
            return $this->returnData("Successfully Return All Packages" ,'Packages',$packages);
        return $this->returnError('Packages not found');

    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'no_station'=>'required|numeric',
            'no_orderPerMonth'=>'required|numeric',
            'no_orderFree'=>'required|numeric',
            'orderPrice'=>'required|numeric',
            'subscribePrice'=>'required|numeric',
        ]);
        Package::create($request->all());
        return  $this->returnSuccess('Added Package Successfully');
    }
    public function update(Request $request,$id)
    {
        $package=Package::find($id);
        if($package)
        {
            $validator=Validator::make($request->all(),[
            'name'=>'string',
            'no_station'=>'numeric',
            'no_orderPerMonth'=>'numeric',
            'no_orderFree'=>'numeric',
            'orderPrice'=>'numeric',
            'subscribePrice'=>'numeric',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        }

            $package->update($request->all());
            return  $this->returnData('Package Updated Successfully','updated Package',$package);
        }
        else
            return $this->returnError('Package not found');

    }
}
