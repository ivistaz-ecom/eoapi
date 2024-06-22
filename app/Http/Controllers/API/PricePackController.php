<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PricePackagesRequest;
use App\Models\PricePackages;
use Illuminate\Support\Facades\DB;

class PricePackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $packs = PricePackages::where('numbooked', '<', 'totalcount')->get();
        $packs = DB::select(DB::raw("SELECT * FROM pricepackages WHERE numbooked < totalcount AND offerstatus = 'y' LIMIT 1"));
        if($packs) {
            return response()->json($packs, 200)->withHeaders(['X-Total-Count', count($packs)]);
        } else {
            return 'No package';
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PricePackagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = PricePackages::find($id);
        return response()->json($package);
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
        // $numbooked = PricePackages::find($request->id);
        // if ($numbooked->numbooked < $numbooked->totalcount) {
        //     $pricepak = PricePackages::where('id', $request->id)->increment('numbooked', $request->count);
        //     return response()->json(['message' => 'Number booked updated']);
        // } else {
        //     return response()->json(['message' => 'limit full']);
        // }
        
        $pricepak = PricePackages::where('id', $id)->increment('numbooked', $request->count);
        return response()->json(['message' => 'Number booked updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
