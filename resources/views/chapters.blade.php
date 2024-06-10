@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">List of Chapters</h4> <a href="{{ route('add-member') }}" class="btn btn-primary btn-sm float-right">Add Chapter</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($chapters as $chapter)
                <tr>
                    <td>{{ $chapter->chapters }}</td>
                    <td>{{ $chapter->description }}</td>
                    <td><a href="{{ route('show-chapter', $chapter->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-chapter', $chapter->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-chapter', $chapter->id) }}" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
            {!! $chapters->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection