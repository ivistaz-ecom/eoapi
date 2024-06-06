<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegCountModel;
use App\Http\Requests\RegCountRequest;

class RegCountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regcount = RegCountModel::get();
        return view('regcount', ['regcount' => $regcount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegCountRequest $request)
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
        $regcount = RegCountModel::find($id);
        return view('showcount', ['regcount' => $regcount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regcount = RegCountModel::find($id);
        return view('editcount', ['regcount' => $regcount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegCountRequest $request)
    {
        $regcount = RegCountModel::find($request->id);
        $regcount->update($request->all());
        return \Redirect::route('registration-count')->with(['message' => 'Count updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RegCountModel::destroy($id);
        return \Redirect::route('registration-count')->with(['message' => 'Count deleted successfully']);
    }
}
