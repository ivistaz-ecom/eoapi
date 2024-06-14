<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentInfo;
use Illuminate\Support\Facades\DB;

class PaymentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = PaymentInfo::orderBy('id', 'DESC')->paginate(10);
        return view('paymentinfo', ['payments' => $payment]);
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
    public function store(Request $request)
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
        $payment = PaymentInfo::find($id);
        return view('paymentview', ['payment' => $payment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * Download payment info
     * in csv format
     * 
     */
    public function downloaddata () {
        $data = DB::table('paymentinfo')
        ->leftJoin('riemembers', 'paymentinfo.eoid', 'riemembers.eoid')
        ->select('paymentinfo.firstname', 'paymentinfo.lastname', 'paymentinfo.region', 'paymentinfo.amount', 'paymentinfo.txnid', 'paymentinfo.email', 'paymentinfo.company', 'riemembers.addr1', 'riemembers.addr2', 'riemembers.city','riemembers.state', 'riemembers.pin', 'riemembers.country', 'riemembers.eoid', 'riemembers.spouseid', 'paymentinfo.created_at')
        ->where('paymentinfo.paymentstatus', 'success')
        ->get();
        
        // Name of the downloaded file
        $fileName = 'paymentdata.csv';

        // Headers
        $headers = array(
            "Content-type"        => "text/csv;charset=UTF-8",
            "Content-Encoding"    => "UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        // Column names of the CSV fie
        $columns = array('First Name', 'Last Name', 'Region', 'Amount', 'TXN ID', 'Email', 'Company', 'Address 1', 'Address 2', 'City', 'State', 'PIN', 'Country', 'eoid', 'Spouse ID', 'Create Dt');

        $callback = function() use($data, $columns) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, $columns);
            foreach ($data as $task) {
                fputcsv($file, [
                    $task->firstname,
                    $task->lastname,
                    $task->region,
                    $task->amount,
                    $task->txnid,
                    $task->email,
                    $task->company,
                    $task->addr1,
                    $task->addr2,
                    $task->city,
                    $task->state,
                    $task->pin,
                    $task->country,
                    $task->eoid,
                    $task->spouseid,
                    $task->created_at
                ]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
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
        return \Redirect::route('payments')->with(['message' => 'Payment deleted successfully']);
    }
}
