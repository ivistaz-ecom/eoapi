<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PricePackageRequest;
use App\Models\PricePackages;

class PricePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricepacks = PricePackages::get();
        return view('pricepacks', ['pricepacks' => $pricepacks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addpackage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PricePackageRequest $request)
    {
        //dd($request);
        $pricepackage = PricePackages::create($request->all());
        return \Redirect::route('price-packs')->with(['message' => 'Package added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packages = PricePackages::find($id);
        return view('editpack', ['packages' => $packages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $package = PricePackages::find($request->packid);
        $package->update($request->all());
        return \Redirect::route('price-packs')->with(['message' => 'Price package updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PricePackages::destroy($id);
        return \Redirect::route('price-packs')->with(['message' => 'Price package deleted successfully']);
    }
}
