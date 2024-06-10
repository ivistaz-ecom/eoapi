@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Dashboard</h4>
        
        <div class="row">
            <div class="col-md-4 justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total registered members</h5>
                        <p class="card-text">{{ $members }}</p>
                        <a href="{{ route('members') }}" class="btn btn-primary">View Members</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total payments</h5>
                        <p class="card-text">{{ $payment }}</p>
                        <a href="{{ route('chapters') }}" class="btn btn-primary">View Payments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Offers</h5>
                        <p class="card-text">{{ $offers }}</p>
                        <a href="#" class="btn btn-primary">View Offers</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Registration Status</td>
                    <td>Company</td>
                    <td>Amount</td>
                    <td>Payment Status</td>
                    <td>Edit</td>
                </tr>
            </thead>
            @foreach ($regmembers as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->firstname }}</td>
                <td>{{ $member->lastname }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->regstatus }}</td>
                <td>{{ $member->company }}</td>
                <td>{{ $member->currency, $member->amount }}</td>
                <td>{{ $member->paymentstatus }}</td>
                <td><a href="{{ route('show-member', $member->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-member', $member->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-member', $member->id) }}" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
            </tr>
            @endforeach
        </table>
        {!! $members->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
