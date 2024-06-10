@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 style="display:inline">List of Regions</h4> <a href="{{ route('regions') }}" class="btn btn-primary btn-sm float-right">All Regions</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Region</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($regions as $region)
                <tr>
                    <td>{{ $region->region }}</td>
                    <td><a href="{{ route('show-region', $region->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('delete-region', $region->id) }}" onclick="return confirm('Are you sure you want to delete this region?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection