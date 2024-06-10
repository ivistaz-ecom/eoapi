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
        $members = RieMembers::count();
        $payment = PaymentInfo::count();
        $offers = OfferPackages::count();
        $regmembers = DB::table('eomembers')
        ->leftJoin('riemembers', 'eomembers.id', '=', 'riemembers.eoid')
        ->select('eomembers.id', 'eomembers.firstname', 'eomembers.lastname', 'eomembers.email', 'eomembers.regstatus', 'paymentinfo.company', 'paymentinfo.currency', 'paymentinfo.amount', 'paymentinfo.paymentstatus')
        ->where('paymentinfo.paymentstatus', '=', 'success');
        return view('home', ["members" => $members, 'payment' => $payment, 'offers' => $offers, 'regmembers' => $regmembers]);
    }
}
