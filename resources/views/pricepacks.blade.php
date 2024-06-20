@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Price Offers</h4> <a href="{{ route('add-package') }}" class="btn btn-primary btn-sm float-right">Create PricePack</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif

            @if (count($pricepacks) < 1)
                <h6>No packs exists</h6>
            @else 
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <td>Package</td>
                            <td>Order</td>
                            <td>Member Fee</td>
                            <td>SLP Fee</td>
                            <td>Booked</td>
                            <td>Count</td>
                            <td>Status</td>
                            <td>Edit</td>
                        </tr>
                    </thead>
                    @foreach ($pricepacks as $packs)
                    <tr>
                        <td>{{ $packs->packagename }}</td>
                        <td>{{ $packs->packageorder }}</td>
                        <td>{{ $packs->memberfee }}</td>
                        <td>{{ $packs->slpfee }}</td>
                        <td>{{ $packs->numbooked }}</td>
                        <td>{{ $packs->totalcount }}</td>
                        <td>{{ $packs->offerstatus }}</td>
                        <td><a href="{{ route('edit-pack', $packs->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-pack', $packs->id) }}" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
</div>
@endsection