@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Edit Price Offer</h4> <a href="{{ route('price-packs') }}" class="btn btn-primary btn-sm float-right">All Offers</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <div class="row mt-4">
                <div class="col-md-8">
                    <form action="{{ route('update-pack') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>Package Name</label>
                                <input type="text" name="packagename" value="{{ $packages->packagename }}" class="form-control">
                            </div>
                            <div class="col">
                                <label>Package Rank</label>
                                <input type="text" name="packageorder" value="{{ $packages->packageorder }}" class="form-control">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Member fee</label>
                                <input type="text" name="memberfee" value="{{ $packages->memberfee }}" class="form-control">
                            </div>
                            <div class="col">
                                <label>SLP fee</label>
                                <input type="text" name="slpfee" value="{{ $packages->slpfee }}" class="form-control">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Total Count</label>
                                <input type="text" name="totalcount" value="{{ $packages->totalcount }}" class="form-control">
                            </div>
                            <div class="col">
                                <label>Booked</label>
                                <input type="text" name="numbooked" value="{{ $packages->numbooked }}" class="form-control">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="offerstatus" value="y" type="checkbox" <?php if ($packages->offerstatus == 'y') echo 'checked'; ?>>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Package Status</label>
                                </div>
                            </div>
                            <div class="col">
                                <input type="hidden" name="packid" value="{{ $packages->id }}">
                            </div>
                        </div>
                        <br />
                        <input type="submit" name="submit" value="Update Offer" class="btn btn-primary">&nbsp;<a href="{{ route('price-packs') }}" class="btn btn-primary">All Offers</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection