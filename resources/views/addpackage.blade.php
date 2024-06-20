@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Create Price Offer</h4> <a href="{{ route('price-packs') }}" class="btn btn-primary btn-sm float-right">All Offers</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <div class="row mt-4">
                <div class="col-md-8">
                    <form action="{{ route('create-package') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>Package Name</label>
                                <input type="text" name="packagename" class="form-control">
                            </div>
                            <div class="col">
                                <label>Package Rank</label>
                                <input type="text" name="packageorder" class="form-control">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Member fee</label>
                                <input type="text" name="memberfee" class="form-control">
                            </div>
                            <div class="col">
                                <label>SLP fee</label>
                                <input type="text" name="slpfee" class="form-control">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Total Count</label>
                                <input type="text" name="totalcount" class="form-control">
                            </div>
                            <div class="col">
                                <label>Booked</label>
                                <input type="text" name="numbooked" class="form-control">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="offerstatus" value="y" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Package Status</label>
                                </div>
                            </div>
                            <div class="col">
                                
                            </div>
                        </div>
                        <br />
                        <input type="submit" name="submit" value="Create Offer" class="btn btn-primary">&nbsp;<a href="{{ route('price-packs') }}" class="btn btn-primary">All Offers</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection