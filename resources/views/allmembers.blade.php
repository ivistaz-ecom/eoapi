@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h4>List of Members</h4>
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
                <td><a href="{{ route('show-member', $member->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="#"><i class="bi bi-pencil"></i></a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection