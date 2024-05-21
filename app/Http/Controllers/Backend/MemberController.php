<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eomembers;
use App\Models\Chapters;
use App\Models\Regions;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Eomembers::select('*')->paginate(12);
        return view('allmembers', ["members" => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addmember');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eomembers = new Eomembers();
        $eomembers->firstname = $request->firstname;
        $eomembers->lastname = $request->lastname;
        $eomembers->email = $request->email;
        $eomembers->chapter = $request->chapter;
        $eomembers->region = $request->region;
        $eomembers->joindt = $request->joindt;
        $eomembers->industry = $request->industry;
        $eomembers->voucher_amt = $request->voucher_amt;
        $eomembers->exprdt = $request->exprdt;
        $eomembers->save();

        return \Redirect::route('members')->with(['message' => 'Member added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = DB::table('eomembers')
        ->leftJoin('eochapters', 'eomembers.chapter', '=', 'eochapters.id')
        ->leftJoin('eoregions', 'eomembers.region', '=', 'eoregions.id')
        ->select('eomembers.id', 'eomembers.firstname', 'eomembers.lastname', 'eomembers.email', 'eomembers.gender', 'eomembers.spouse_id as spouse', 'eochapters.chapters', 'eoregions.region', 'eomembers.industry', 'eomembers.joindt')
        ->where('eomembers.id', $id)
        ->get();
        return view('showmember', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Eomembers::find($id);
        $chapters = Chapters::get();
        $regions = Regions::get();
        return view('editmember', ['member' => $member, 'chapters' => $chapters, 'regions' => $regions]);
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
        $eomembers = Eomembers::find($request->id);
        $eomembers->update($request->all());

        return \Redirect::route('edit-member', $request->id)->with(['message' => 'Member updated successfully']);
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
        return \Redirect::route('members')->with(['message' => 'Member deleted successfully']);
    }
}
