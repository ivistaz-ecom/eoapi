@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Edit Offer</h4> <a href="{{ route('add-offer') }}" class="btn btn-primary btn-sm float-right">Add Offer</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <div class="row mt-4">
                <div class="col-md-8">
                    <form action="{{ route('update-offer') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>Offer</label>
                                <input type="text" name="packagename" class="form-control" value="{{ $offer->packagename }}">
                            </div>
                            <div class="col">
                                <label>Discount</label>
                                <input type="text" name="discountpercent" class="form-control" value="{{ $offer->discountpercent }}">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Start Dt</label>
                                <input type="date" name="strdt" class="form-control" value="{{ $offer->strdt }}">
                            </div>
                            <div class="col">
                                <label>End Dt</label>
                                <input type="date" name="enddt" class="form-control" value="{{ $offer->enddt }}">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Total Offers</label>
                                <input type="text" name="offercount" class="form-control" value="{{ $offer->offercount }}">
                            </div>
                            <div class="col">
                                <label>Booked</label>
                                <input type="text" name="numbooked" class="form-control" value="{{ $offer->numbooked }}">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <label>Package Order</label>
                                <input type="text" name="packageorder" class="form-control" value="{{ $offer->packageorder }}">
                            </div>
                            <div class="col">
                                <label>Status</label>
                                <select name="offerstatus" class="form-control">
                                    <option value="y" <?php if($offer->offerstatus == 'y') echo 'selected'; ?> >Y</option>
                                    <option value="n" <?php if($offer->offerstatus == 'n') echo 'selected'; ?> >N</option>
                                </select>
                                <input type="hidden" name="id" value="{{ $offer->id }}" />
                            </div>
                        </div>
                        <br />
                        <input type="submit" name="submit" value="Update Offer" class="btn btn-primary">&nbsp;<a href="{{ route('offers') }}" class="btn btn-primary">All Offers</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection