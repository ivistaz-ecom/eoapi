@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Add Offer</h4> <a href="{{ route('offers') }}" class="btn btn-primary btn-sm float-right">All Offers</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <div class="row mt-4">
                <div class="col-md-8">
                    <form action="{{ route('save-offer') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>Offer</label>
                                <input type="text" name="packagename" class="form-control">
                            </div>
                            <div class="col">
                                <label>Discount</label>
                                <input type="text" name="discountpercent" class="form-control">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Start Dt</label>
                                <input type="date" name="strdt" class="form-control">
                            </div>
                            <div class="col">
                                <label>End Dt</label>
                                <input type="date" name="enddt" class="form-control">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Total Offers</label>
                                <input type="text" name="offercount" class="form-control">
                            </div>
                            <div class="col">
                                <label>Booked</label>
                                <input type="text" name="numbooked" class="form-control">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Package Order</label>
                                <input type="text" name="packageorder" class="form-control">
                            </div>
                            <div class="col">
                                <label>Status</label>
                                <select name="offerstatus" class="form-control">
                                    <option value="y">Y</option>
                                    <option value="n">N</option>
                                </select>
                            </div>
                        </div>
                        <br />
                        <input type="submit" name="submit" value="Save Offer" class="btn btn-primary">&nbsp;<a href="{{ route('offers') }}" class="btn btn-primary">All Offers</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection