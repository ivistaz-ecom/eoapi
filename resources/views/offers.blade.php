@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">List of Offers</h4> <a href="{{ route('add-offer') }}" class="btn btn-primary btn-sm float-right">Add Offer</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Package</td>
                        <td>Discount</td>
                        <td>Start Dt</td>
                        <td>End Dt</td>
                        <td>Count</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($offers as $offer)
                <tr>
                    <td>{{ $offer->packagename }}</td>
                    <td>{{ $offer->discountpercent }}</td>
                    <td>{{ $offer->strdt }}</td>
                    <td>{{ $offer->enddt }}</td>
                    <td>{{ $offer->offercount }}</td>
                    <td><a href="{{ route('show-offer', $offer->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-offer', $offer->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-offer', $offer->id) }}" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection