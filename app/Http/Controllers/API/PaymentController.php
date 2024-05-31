<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaymentRequest;
use App\Models\PaymentInfo;
use App\Models\RieMembers;
use App\Models\RieMembersPref;
use App\Models\Eomembers;
use App\Models\SlpRegistration;
use App\Models\SlpPreferences;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['message' => 'Payment info']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        // $paymentstatus = $request->paymentstatus;
        // $eoid = $request->eoid;
        $payment = PaymentInfo::create($request->all());

        if ($request->paymentstatus == 'success') {
             RieMembers::where('eoid', $request->eoid)->update([
                'spouseid' => $request->spouseid,
                'regstatus' => $request->memregstatus
            ]);
            Eomembers::where('id', $request->eoid)->update([
                'spouse_id' => $request->spouseid,
                'spouse_status' => $request->spousestatus,
                'regstatus' => $request->memregstatus
            ]);
            // SlpRegistration::where('eoid', $request->eoid)->update([
            //     'regstatus' => $request->spousestatus
            // ]);
            // if ($request->voucher > 0) {
            //     Eomembers::where('id', $request->eoid)->update([
            //         'voucher_amt' => 0.00
            //     ]);
            // }
        }
       
        return response()->json([
            'message' => 'Payment saved',
            'payment' => $payment
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
        $payment = PaymentInfo::where('eoid', $id)->get();
        $eomember = Eomembers::find($id);
        $riemember = RieMembers::where('eoid', $id)->get();
        $riememberpref = RieMembersPref::where('eoid', $id)->get();
        $slpregistration = SlpRegistration::where('eoid', $id)->get();
        $slppref = SlpPreferences::where('eoid', $id)->get();
        return response()->json([
            'message' => 'Member registration Info',
            'eomember' => $eomember,
            'riemember' => $riemember,
            'riememberpref' => $riememberpref,
            'slpregistration' => $slpregistration,
            'slppref' => $slppref,
            'paymentinfo' => $payment
        ]);
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
        PaymentInfo::destroy($id);
        return response()->json(['message' => 'Paymentinfo deleted']);
    }
}
