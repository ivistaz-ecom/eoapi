<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regions;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Regions::get();
        return response()->json(['eoregions' => $regions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regions = new Regions();
        $regions->region = $request->region;
        $regions->save();

        return response()->json($regions);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regions = Regions::find($id);
        return response()->json($regions);
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
        $regions = Regions::find($id);
        $regions->region = $request->region;
        $regions->save();

        return response()->json($regions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Regions::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
