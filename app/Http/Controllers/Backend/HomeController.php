<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eomembers;
use App\Models\Chapters;
use App\Models\Regions;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $members = Eomembers::count();
        $chapters = Chapters::count();
        $regions = Regions::count();
        return view('home', ["members" => $members, 'chapters' => $chapters, 'regions' => $regions]);
    }
}
