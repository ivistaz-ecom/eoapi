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
        $date = date('Y-m-d');
        $packages = OfferPackages::where('offerstatus', 'y')
            ->where('strdt', '<=', $date)
            ->where('enddt', '>=', $date)
            ->where('numbooked', '<=', 'offercount')
            ->min('packageorder');
        return response()->json(['packages' => $packages]);
    }

    /**
     * Book offer
     */
    public function addBooking($id, $num)
    {
        $package = OfferPackages::find($id);
        if ($package->increment('numbooked', $num)) {
            $numbooked = OfferPackages::where('id', $id)->pluck('numbooked');
            return response()->json(['message' => 'Offer applied', 'nombooked' => $numbooked]);
        } else {
            return response()->json(['message' => 'offer add failed']);
        }
    }

    /**
     * UnBook offer
     */
    public function removeBooking($id, $num)
    {
        $package = OfferPackages::find($id);
        if ($package->decrement('numbooked', $num)) {
            $numbooked = OfferPackages::where('id', $id)->pluck('numbooked');
            return response()->json(['message' => 'Offer removed', 'nombooked' => $numbooked]);
        } else {
            return response()->json(['message' => 'offer remove failed']);
        }
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
    public function update(OfferPackageRequest $request, $id)
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
