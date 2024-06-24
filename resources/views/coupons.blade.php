@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">List of Coupons</h4> <a href="{{ route('add-coupon') }}" class="btn btn-primary btn-sm float-right">Add Coupon</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif

            @if (count($coupons) > 0)
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Code</td>
                        <td>Expiry</td>
                        <td>Type</td>
                        <td>Value</td>
                        <td>Count</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->exprdt }}</td>
                    <td>{{ $coupon->type }}</td>
                    <td>{{ $coupon->value }}</td>
                    <td>{{ $coupon->count }}</td>
                    <td><a href="{{ route('edit-coupon', $coupon->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-coupon', $coupon->id) }}" onclick="return confirm('Are you sure you want to delete this coupon?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
            {!! $coupons->withQueryString()->links('pagination::bootstrap-5') !!}
            @else 
                <h4>No coupons exists</h4>
            @endif
        </div>
    </div>
</div>
@endsection