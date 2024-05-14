<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eomembers;
use App\Models\Chapters;
use App\Models\Regions;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eomembers = Eomembers::get();
        $chapters = Chapters::get();
        $regions = Regions::get();
        return response()->json(['eomembers' => $eomembers, 'chapters' => $chapters, 'regions' => $regions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'chapter' => 'required',
            'region' => 'required',
            'joindt' => 'required'
        ],[
            'firstname.required' => 'Please enter your first name',
            'lastname.required' => 'Please enter your last name',
            'email.required' => 'Please enter your email',
            'chapter.required' => 'Please enter your chapter',
            'region.required' => 'Please enter your region',
            'joindt.required' => 'Please enter your joining date'
        ]);
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

        return response()->json($eomembers);
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
    public function update(Request $request, $id)
    {
        $eomembers = Eomembers::find($id);
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

        return response()->json($eomembers);
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
