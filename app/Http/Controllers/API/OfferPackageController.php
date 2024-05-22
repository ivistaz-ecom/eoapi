<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OfferPackageRequest;
use App\Models\OfferPackages;

class OfferPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = now();
        //$now = $date->toDateString();
        $packages = OfferPackages::where('offerstatus', 'y')
            ->where('rangestart', '>=', $date)
            ->where('rangeend', '<=', $date)
            ->get();
        return response()->json(['packages' => $packages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferPackageRequest $request)
    {
        $offer = OfferPackages::create($request->all());
        return response()->json([
            'message' => 'Offer added successfully',
            'offer' => $offer
        ]);
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
        return response()->json(['offer' => $offer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = OfferPackages::find($id);
        $package->update($request->all());
        return response()->json([
            'message' => 'Offer updated successfully',
            'package' => $package
        ]);
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
        return response()->json(['message' => 'Offer deleted successfully']);
    }
}
