@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 style="display:inline">Registration Count</h4>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Count</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($regcount as $count)
                <tr>
                    <td>{{ $count->regcount }}</td>
                    <td><a href="{{ route('edit-regcount', $count->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-regcount', $count->id) }}" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection