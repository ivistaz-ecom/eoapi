@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 style="display:inline">Create Coupon</h4>
            <h5 class="mt-4">CODE: {{ $coupon->code }}</h5>
            <form action="{{ route('update-coupon') }}" method="post" class="mt-4">
            @csrf
                <div class="row">
                    <div class="col">
                        <label for="exprdt">Expiry Date</label>
                        <input type="date" name="exprdt" value="{{ $coupon->exprdt }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="count">Count</label>
                        <input type="text" name="count" class="form-control" value="{{ $coupon->count }}" placeholder="Count">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="type">Type</label>
                        <select name="type" id="" class="form-control">
                            <option value="">Select value type</option>
                            <option value="percentage" <?php if($coupon->type === 'percentage') echo 'selected'; ?>>Percent</option>
                            <option value="numeric" <?php if($coupon->type === 'numeric') echo 'selected'; ?>>Numeric</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="value">Value</label>
                        <input type="text" name="value" value="{{ $coupon->value }}" class="form-control" placeholder="Value">
                    </div>
                </div>
                <input type="hidden" name="code" value="{{ $coupon->code }}">
                <input type="hidden" name="id" value="{{ $coupon->id }}">
                <input type="submit" name="submit" value="Update Coupon" class="btn btn-primary mt-4">
            </form>
        </div>
        <div class="col-md-6"><a href="{{ route('coupons') }}" class="btn btn-primary btn-sm float-right">All Coupons</a></div>
    </div>
</div>
@endsection