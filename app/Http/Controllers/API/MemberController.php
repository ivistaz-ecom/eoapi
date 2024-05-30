<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Eomembers;
use App\Models\Chapters;
use App\Models\Regions;
use App\Models\OfferPackages;
use App\Models\EventModel;
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
        ->leftJoin('eventdetail', 'eomembers.chapter', '=', 'eventdetail.chapter')
        ->select('eomembers.id', 'eomembers.firstname', 'eomembers.lastname', 'eomembers.email', 'eochapters.chapters', 'eoregions.region', 'eomembers.joindt', 'eomembers.industry', 'eomembers.voucher_amt', 'eomembers.exprdt', 'eomembers.spouse_id', 'eomembers.gender')
        ->where('eventdetail.strdt', '<=', $curdt)
        ->where('eventdetail.enddt', '>=', $curdt)
        ->where('eventdetail.offerstatus', '=', 'y')
        ->get();
        $event = DB::table('eventdetail')
        ->leftJoin('eochapters', 'eventdetail.chapter', '=', 'eochapters.id')
        ->where('eventdetail.strdt', '<=', $curdt)
        ->where('eventdetail.enddt', '>=', $curdt)
        ->where('eventdetail.offerstatus', '=', 'y')
        ->select('eventdetail.eventname', 'eventdetail.offerstatus', 'eochapters.chapters')
        ->get();
        return response()->json(['eomembers' => $eomembers, 'event' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$email = Eomembers::where('email', '=', $request)->find();
        //die($request);
        // if (Eomembers::where('email', '=', $request)->count()>0) {
        //     return response()->json(['message' => 'Email not found']);
        // } elseif ($this->findChapter($request) == false) {
        //     return response()->json(['message' => 'Chapter not allowed']);
        // } else {
        //     $curdt = date('Y-m-d');
        //     $eomembers = DB::table('eomembers')
        //     ->leftJoin('eochapters', 'eomembers.chapter', '=', 'eochapters.id')
        //     ->leftJoin('eoregions', 'eomembers.region', '=', 'eoregions.id')
        //     ->leftJoin('eventdetail', 'eomembers.chapter', '=', 'eventdetail.chapter')
        //     ->select('eomembers.id', 'eomembers.firstname', 'eomembers.lastname', 'eomembers.email', 'eochapters.chapters', 'eoregions.region', 'eomembers.joindt', 'eomembers.industry', 'eomembers.voucher_amt', 'eomembers.exprdt', 'eomembers.spouse_id', 'eomembers.gender')
        //     ->where('eventdetail.strdt', '<=', $curdt)
        //     ->where('eventdetail.enddt', '>=', $curdt)
        //     ->where('eventdetail.offerstatus', '=', 'y')
        //     ->get();
        //     $event = DB::table('eventdetail')
        //     ->leftJoin('eochapters', 'eventdetail.chapter', '=', 'eochapters.id')
        //     ->where('eventdetail.strdt', '<=', $curdt)
        //     ->where('eventdetail.enddt', '>=', $curdt)
        //     ->where('eventdetail.offerstatus', '=', 'y')
        //     ->select('eventdetail.eventname', 'eventdetail.offerstatus', 'eochapters.chapters')
        //     ->get();
        //     return response()->json(['eomembers' => $eomembers, 'event' => $event]);
        // }
        $eomembers = Eomembers::create($request->all());
        return response()->json([
            'messgae' => 'Member saved successfully',
            'eomembers' => $eomembers
        ]);
        //return $request;
    }

    public function findChapter($email) {
        $event = DB::table('eomembers')
        ->leftJoin('eventdetail', 'eventdetail.chapter', '=', 'eomembers.chapter')
        ->select('eomembers.email')
        ->where('eomembers.region', '=', 'eventdetail.region')
        ->where('eomembers.email', '=', $email)
        ->get();
        if (count($event) > 0) {
            return true;
        } else {
            return false;
        }
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
