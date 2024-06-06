@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 style="display:inline">Registration Count</h4>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <form action="{{ route('update-regcount') }}" method="post">
                @csrf
                <label>Count</label>
                <input type="text" name="regcount" class="form-control" value="{{ $regcount->regcount }}" />
                <input type="hidden" name="id" value="{{ $regcount->id }}" />
                <br />
                <input type="submit" value="Save" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection