<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfferPackages;
use App\Http\Requests\OfferPackageRequest;

class OfferPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = OfferPackages::paginate(10);
        return view('offers', ['offers' => $offers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addoffer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferPackageRequest $request)
    {
        //dd($request);
        $offer = OfferPackages::create($request->all());
        return \Redirect::route('offers')->with(['message' => 'Offer added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = OfferPackages::find($id);
        return view('show-offer', ['offer' => $offer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = OfferPackages::find($id);
        return view('edit-offer', ['offer' => $offer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferPackageRequest $request)
    {
        //dd($request);
        $offer = OfferPackages::find($request->id);
        $offer->update($request->all());
        return \Redirect::route('offers')->with(['message' => 'Offer updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OfferPackages::destroy($id);
        return \Redirect::route('offers')->with(['message' => 'Offer deleted successfully']);
    }
}
