<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eomembers;

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
        $member = Eomembers::find($id);
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
        return view('editmember', ['member' => $member]);
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
        return $request;
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
