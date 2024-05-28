@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Offer Detail</h4> <a href="{{ route('add-offer') }}" class="btn btn-primary btn-sm float-right">Add Offer</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <div class="row mt-4">
                <div class="col-md-8">
                    <table class="table table-striped mt-4">
                        <tr>
                            <td>Package</td>
                            <td>{{ $offer->packagename }}</td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td>{{ $offer->discountpercent }}</td>
                        </tr>
                        <tr>
                            <td>Start Dt</td>
                            <td>{{ $offer->strdt }}</td>
                        </tr>
                        <tr>
                            <td>End Dt</td>
                            <td>{{ $offer->enddt }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $offer->offerstatus }}</td>
                        </tr>
                        <tr>
                            <td>Offer Count</td>
                            <td>{{ $offer->offercount }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('edit-offer', $offer->id) }}" class="btn btn-primary">Edit Offer</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection