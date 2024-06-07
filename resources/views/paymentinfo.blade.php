@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Payments</h4>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>SL no</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Region</td>
                        <td>Amount</td>
                        <td>Email</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->firstname }}</td>
                    <td>{{ $payment->lastname }}</td>
                    <td>{{ $payment->region }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->email }}</td>
                    <td><a href="{{ route('payment-detail', $payment->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href=""><i class="bi bi-pencil"></i></a>&nbsp;<a href="" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
            {!! $payments->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection