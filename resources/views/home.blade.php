@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h4>Dashboard</h4>
        <div class="col-md-4 justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Members</h5>
                    <p class="card-text">{{ $members }}</p>
                    <a href="{{ route('members') }}" class="btn btn-primary">View Members</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chapters</h5>
                    <p class="card-text">{{ $chapters }}</p>
                    <a href="#" class="btn btn-primary">View Chapters</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Regions</h5>
                    <p class="card-text">{{ $regions }}</p>
                    <a href="#" class="btn btn-primary">View Regions</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
