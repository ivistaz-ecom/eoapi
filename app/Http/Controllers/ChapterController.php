<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapters;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapters::get();
        return response()->json(['eochapters' => $chapters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chapters = new Chapters();
        $chapters->chapters = $request->chapters;
        $chapters->description = $request->description;
        $chapters->save();

        return response()->json($chapters);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapters = Chapters::find($id);
        return response()->json($chapters);
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
        $chapters = find($id);
        $chapters->chapters = $request->chapters;
        $chapters->description = $request->description;
        $chapters->save();

        return response()->json($chapters);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapters::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
