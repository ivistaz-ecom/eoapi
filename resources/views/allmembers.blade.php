@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">List of Members</h4> <a href="{{ route('add-member') }}" class="btn btn-primary btn-sm float-right">Add Member</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Chapter</td>
                        <td>Region</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($members as $member)
                <tr>
                    <td>{{ $member->firstname }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->chapter }}</td>
                    <td>{{ $member->region }}</td>
                    <td><a href="{{ route('show-member', $member->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-member', $member->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-member', $member->id) }}" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection