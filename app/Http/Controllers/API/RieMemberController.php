<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRieMemberRequest;
use App\Models\RieMembers;

class RieMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riemembers = RieMembers::get();
        return response()->json([
            'message' => 'Silence is golden',
            'riemember' => $riemembers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRieMemberRequest $request)
    {
        $riemember = RieMembers::create($request->all());
        return response()->json([
            'messgae' => 'RieMember saved successfully',
            'riemembers' => $riemember
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
        $riemember = RieMembers::find($id);
        return response()->json($riemember);
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
        RieMembers::destroy($id);
        return response()->json(['message' => 'Member deleted successfully']);
    }
}
