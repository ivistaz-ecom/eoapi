<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        $chapters = Chapters::paginate(10);
        return view('chapters', ['chapters' => $chapters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addchapter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chapter = new Chapters();
        $chapter->chapters = $request->chapter;
        $chapter->description = $request->description;
        $chapter->save();

        return \Redirect::route('chapters')->with(['message' => 'Chapter added successfully']);
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
        return view('showchapter', ['chapters' => $chapters]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapters = Chapters::find($id);
        return view('editchapter', ['chapters' => $chapters]);
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
        $chapters = Chapters::find($request->id);
        $chapters->update($request->all());
        return \Redirect::route('edit-chapter', $request->id)->with(['message' => 'Chapter updated successfully']);
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
        return \Redirect::route('chapters')->with(['message' => 'Chapter deleted successfully']);
    }
}
