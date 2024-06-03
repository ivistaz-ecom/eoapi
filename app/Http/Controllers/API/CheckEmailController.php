<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eomembers;
use App\Models\Chapters;
use App\Models\Regions;
use App\Models\OfferPackages;
use App\Models\EventModel;
use Illuminate\Support\Facades\DB;

class CheckEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['message' => 'Email is called']);
    }

    /**
     * Check if email exists in the database
     * 
     * @param $request
     * @return txt emssage
     */
    public function checkEmail(Request $request)
    {
        if ( Eomembers::where('email', $request->email)->exists() ) {
            $curdt = date('Y-m-d');
            $eomembers = DB::table('eomembers')
            ->leftJoin('eochapters', 'eomembers.chapter', '=', 'eochapters.id')
            ->leftJoin('eoregions', 'eomembers.region', '=', 'eoregions.id')
            ->leftJoin('eventdetail', 'eomembers.chapter', '=', 'eventdetail.chapter')
            ->select('eomembers.id', 'eomembers.firstname', 'eomembers.lastname', 'eomembers.email', 'eochapters.chapters', 'eoregions.region', 'eomembers.joindt', 'eomembers.industry', 'eomembers.voucher_amt', 'eomembers.exprdt', 'eomembers.spouse_id', 'eomembers.gender', 'eomembers.regstatus')
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
            if ($event->count()<1) {
                $event = 'No event running';
            }
            return response()->json(['message' => 'Email exists','data' => 'true','eomembers' => $eomembers, 'event' => $event]);
        } else {
            return response()->json(['message' => 'Email does not exists','data' => 'false']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
