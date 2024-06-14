<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eomembers;
use App\Models\OfferPackages;
use App\Models\PaymentInfo;
use App\Models\RieMembers;
use Illuminate\Support\Facades\DB;

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
        $members = PaymentInfo::count();
        $payment = DB::table('paymentinfo')->where('paymentstatus', '=', 'success')->sum('memcount');
        $offers = OfferPackages::count();
        $regmembers = DB::table('eomembers')
        ->leftJoin('eochapters', 'eomembers.chapter', 'eochapters.id')
        ->leftJoin('eoregions','eomembers.region', 'eoregions.id')
        ->leftJoin('paymentinfo','eomembers.id', 'paymentinfo.eoid')
        ->select('paymentinfo.id', 'eomembers.firstname', 'eomembers.lastname', 'eochapters.chapters', 'eoregions.region', 'paymentinfo.currency', 'paymentinfo.amount', 'paymentinfo.created_at')
        ->where('paymentinfo.paymentstatus', 'success')->orderBy('paymentinfo.id', 'desc')->paginate(10);
        $regcount = Count($regmembers);
        // $regmembers = DB::select(DB::raw("SELECT eomembers.id, eomembers.firstname, eomembers.lastname, eochapters.chapters, eoregions.region, paymentinfo.currency, paymentinfo.amount, paymentinfo.created_at FROM eomembers LEFT JOIN eochapters ON eomembers.chapter = eochapters.id LEFT JOIN eoregions ON eomembers.region = eoregions.id left JOIN paymentinfo ON eomembers.id = paymentinfo.eoid WHERE paymentinfo.paymentstatus = 'success' order by paymentinfo.id DESC"));
        return view('home', ["members" => $members, 'payment' => $payment, 'offers' => $offers, 'regmembers' => $regmembers, 'count' => $regcount]);
    }

    /**
     * Method to handle search
     * Search based on email or member id
     * @param id string or int
     * 
     * @return user data
     */
    public function searchmember (Request $request) {
        if (empty($request->search)) {
            return view('searchresult', ['member' => 'Please enter search key']);
        }

        if (is_integer($request->search)) {
            $member = Eomembers::where('id', $request->search)->get();
        } elseif (is_string($request->search)) {
            $member = Eomembers::where('email', $request->search)->get();
        }

        if (count((array)$member) === 0) {
            return view('searchresult', ['member' => 'No data found']);
        } else {
            return view('searchresult', ['member' => $member]);
        }
        // return view('searchresult', ['data' => $request->search]);
    }
}
