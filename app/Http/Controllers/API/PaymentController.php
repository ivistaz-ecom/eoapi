<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaymentRequest;
use App\Models\PaymentInfo;
use App\Models\RieMembers;
use App\Models\Eomembers;

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
        //$paymentstatus = $request->paymentstatus;
        $eoid = $request->eoid;
        $payment = PaymentInfo::create($request->all());

        if ($request->paymentstatus == 'success') {
             RieMembers::where('eoid', $request->eoid)->update([
                'sopuseid' => $request->spouseid, 
                'memregstatus' => $request->memregstatus
            ]);
            Eomembers::where('id', $request->eoid)->update([
                'sopuse_id' => $request->spouseid,
                'spouse_status' => $request->spousestatus
            ]);
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
        $payment = PaymentInfo::find($id);
        return response()->json($payment);
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
