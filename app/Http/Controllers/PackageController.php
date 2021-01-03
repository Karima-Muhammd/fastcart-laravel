<?php

namespace App\Http\Controllers;

use App\Package;
use App\Payment;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $packages=Package::all();
        return view('packages.index',[
            'packages'=>$packages,
        ]);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
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
        return response()->json([
            'success'=>"Added Package Successfully",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function show($id)
    {

        $package=Package::find($id);
        return view('packages.index',[
            'package'=>$package,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $package=Package::find($id);
        return view('admin.packages.update',['package'=>$package]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        $package=Package::find($id);
        $request->validate([
            'name'=>'string',
            'no_station'=>'numeric',
            'no_orderPerMonth'=>'numeric',
            'no_orderFree'=>'numeric',
            'orderPrice'=>'numeric',
            'subscribePrice'=>'numeric',
        ]);

        $package->update($request->all());
        return response()->json([
            'success'=>"update book successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package=Package::find($id);
        $package->delete();
        return response()->json([
            'success'=>"Deleted"
        ]);
    }
}
