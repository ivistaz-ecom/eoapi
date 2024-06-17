@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Member Detail') }}</div>
        @if ($member === 'none')
            <div class="card-body">Please search key</div>
        @elseif ($member->count() == 0)
            <div class="card-body">No result found</div>
        @elseif ($member->count() == 1)
            <div class="card-body">
                <table class="table table-striped mt-4">
                    <tr>
                        <td>First Name</td>
                        <td>{{ $member[0]->firstname }}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{{ $member[0]->lastname }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{ $member[0]->gender }}</td>
                    </tr>
                    <tr>
                        <td>Spouse ID</td>
                        <td>{{ $member[0]->spouse_id }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $member[0]->email }}</td>
                    </tr>
                    <tr>
                        <td>Chapter</td>
                        <td>{{ $member[0]->chapter }}</td>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td>{{ $member[0]->region }}</td>
                    </tr>
                    <tr>
                        <td>Joining Date</td>
                        <td>{{ $member[0]->joindt }}</td>
                    </tr>
                    <tr>
                        <td>Industry</td>
                        <td>{{ $member[0]->industry }}</td>
                    </tr>
                </table>
                <a href="{{ route('edit-member', $member[0]->id) }}" class="btn btn-primary">Edit Member</a>&nbsp;
                <a href="{{ route('members') }}" class="btn btn-primary">All Members</a>
            </div>
        @else 
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>SL</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Chapter</td>
                        <td>Region</td>
                        <td>Spouse ID</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($member as $mem)
                <tr>
                    <td>{{ $mem->id }}</td>
                    <td>{{ $mem->firstname }}</td>
                    <td>{{ $mem->lastname }}</td>
                    <td>{{ $mem->email }}</td>
                    <td>{{ $mem->chapter }}</td>
                    <td>{{ $mem->region }}</td>
                    <td>{{ $mem->spouse_id }}</td>
                    <td><a href="{{ route('show-member', $mem->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-member', $mem->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-member', $mem->id) }}" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
            {!! $member->withQueryString()->links('pagination::bootstrap-5') !!}
        
        @endif
    </div>
</div>
@endsection