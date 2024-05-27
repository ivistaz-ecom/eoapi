<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Eomembers;
use App\Models\Chapters;
use App\Models\Regions;
use App\Models\OfferPackages;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curdt = date('Y-m-d');
        $eomembers = DB::table('eomembers')
        ->leftJoin('eochapters', 'eomembers.chapter', '=', 'eochapters.id')
        ->leftJoin('eoregions', 'eomembers.region', '=', 'eoregions.id')
        ->select('eomembers.id', 'eomembers.firstname', 'eomembers.lastname', 'eomembers.email', 'eomembers.gender', 'eomembers.spouse_id as spouse', 'eochapters.chapters', 'eoregions.region', 'eomembers.industry', 'eomembers.joindt', 'eomembers.voucher_amt', 'eomembers.exprdt', 'eomembers.spouse_status')
        ->where('eomembers.chapter', '=', 4)
        ->where('eomembers.region', '=', 4)
        ->get();
        $chapters = Chapters::get();
        $regions = Regions::get();
        $packages = OfferPackages::where('rangestart', '<=', $curdate)->wherer('rangeend', '>=', $curdate)->get();
        return response()->json(['eomembers' => $eomembers, 'chapters' => $chapters, 'regions' => $regions, 'packages' => $packages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $eomembers = Eomembers::create($request->all());
        return response()->json([
            'messgae' => 'Member saved successfully',
            'eomembers' => $eomembers
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
        $eomembers = Eomembers::find($id);
        return response()->json($eomembers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $eomembers = Eomembers::find($id);
        $eomembers->update($request->all());
        return response()->json([
            'message' => 'Member updated successfully',
            'eomembers' => $eomembers 
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
        Eomembers::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
