@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">List of Users</h4> <a href="{{ route('add-user') }}" class="btn btn-primary btn-sm float-right">Add User</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Created at</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('edit-user', $user->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-user', $user->id) }}" onclick="return confirm('Are you sure you want to delete this user?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
            {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection