@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Member Detail') }}</div>

                <div class="card-body">
                    <table class="table table-striped mt-4">
                        <tr>
                            <td>First Name</td>
                            <td>{{ $member->firstname }}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{ $member->lastname }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ $member->gender }}</td>
                        </tr>
                        <tr>
                            <td>Spouse ID</td>
                            <td>{{ $member->spouse_id }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $member->email }}</td>
                        </tr>
                        <tr>
                            <td>Chapter</td>
                            <td>{{ $member->chapter }}</td>
                        </tr>
                        <tr>
                            <td>Region</td>
                            <td>{{ $member->region }}</td>
                        </tr>
                        <tr>
                            <td>Joining Date</td>
                            <td>{{ $member->joindt }}</td>
                        </tr>
                        <tr>
                            <td>Industry</td>
                            <td>{{ $member->industry }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('edit-member', $member->id) }}" class="btn btn-primary">Edit Member</a>&nbsp;
                    <a href="{{ route('members') }}" class="btn btn-primary">All Members</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection