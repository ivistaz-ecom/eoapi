@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Dashboard</h4>
        
    <div class="row">
        <div class="col-md-4 justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total registered members</h5>
                    <p class="card-text">{{ $payment }}</p>
                    <a href="{{ route('rie-members') }}" class="btn btn-primary">Registered Members</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total payments</h5>
                    <p class="card-text">{{ $members }}</p>
                    <a href="{{ route('payments') }}" class="btn btn-primary">View Payments</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Offers</h5>
                    <p class="card-text">{{ $offers }}</p>
                    <a href="{{ route('offers') }}" class="btn btn-primary">View Offers</a>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <td>SL</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Chapter</td>
                <td>Region</td>
                <td>Amount</td>
                <td>Time</td>
                <td>Edit</td>
            </tr>
        </thead>
        @foreach ($regmembers as $member)
        @php($count=0)
        <tr>
            <td>{{ $count }}</td>
            <td>{{ $member->firstname }}</td>
            <td>{{ $member->lastname }}</td>
            <td>{{ $member->chapters }}</td>
            <td>{{ $member->region }}</td>
            <td>{{ $member->currency }}, {{ $member->amount }}</td>
            <td>{{ $member->created_at }}</td>
            <td><a href="{{ route('show-member', $member->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-member', $member->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-member', $member->id) }}" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
        </tr>
        @php($count++)
        @endforeach
    </table>
</div>
@endsection
