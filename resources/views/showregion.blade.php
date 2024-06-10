@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Region Detail</h4> <a href="{{ route('regions') }}" class="btn btn-primary btn-sm float-right">All Regions</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <div class="row mt-4">
                <div class="col-md-8">
                    <table class="table table-striped mt-4">
                        <tr>
                            <td>ID</td>
                            <td>{{ $region->id }}</td>
                        </tr>
                        <tr>
                            <td>Region</td>
                            <td>{{ $region->region }}</td>
                        </tr>
                        <tr>
                            <td>Create Dt</td>
                            <td>{{ $region->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection