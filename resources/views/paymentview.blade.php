@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment Detail') }}</div>
                
                <div class="card-body">
                    <table class="table table-striped mt-4">
                        <tr>
                            <td>Firstname</td>
                            <td>{{ $payment->firstname }}</td>
                        </tr>
                        <tr>
                            <td>Lastname</td>
                            <td>{{ $cpayment->lastname }}</td>
                        </tr>
                        <tr>
                            <td>Region</td>
                            <td>{{ $payment->region }}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{ $cpayment->amount }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $payment->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $cpayment->phone }}</td>
                        </tr>
                        <tr>
                            <td>Company</td>
                            <td>{{ $payment->company }}</td>
                        </tr>
                        <tr>
                            <td>Company Address</td>
                            <td>{{ $cpayment->companyaddr }}</td>
                        </tr>
                        <tr>
                            <td>Currency</td>
                            <td>{{ $payment->currency }}</td>
                        </tr>
                        <tr>
                            <td>Voucher Amount</td>
                            <td>{{ $cpayment->amount }}</td>
                        </tr>
                        <tr>
                            <td>Expr Date</td>
                            <td>{{ $payment->exprdt }}</td>
                        </tr>
                        <tr>
                            <td>Spouse Status</td>
                            <td>{{ $cpayment->spousestatus }}</td>
                        </tr>
                        <tr>
                            <td>Transaction ID</td>
                            <td>{{ $payment->txnid }}</td>
                        </tr>
                        <tr>
                            <td>Payment Status</td>
                            <td>{{ $cpayment->paymentstatus }}</td>
                        </tr>
                        <tr>
                            <td>Registration Status</td>
                            <td>{{ $payment->regstatus }}</td>
                        </tr>
                        <tr>
                            <td>Member Count</td>
                            <td>{{ $cpayment->memcount }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection