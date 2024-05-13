@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <h4 style="display:inline">Edit Member</h4>
        <div class="col-md-6 justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('update-member') }}">
                        @csrf
                        <label>First Name</label>
                        <input type="text" name="firstname" value="{{$member->firstname}}" class="form-control" />
                        <br />
                        <label>Last Name</label>
                        <input type="text" name="lastname" value="{{$member->lastname}}" class="form-control" />
                        <br />
                        <label>Email</label>
                        <input type="email" name="email" value="{{$member->email}}" class="form-control" />
                        <br />
                        <label>Chapter</label>
                        <input type="text" name="chapter" value="{{$member->chapter}}" class="form-control" />
                        <br />
                        <label>Region</label>
                        <input type="text" name="region" value="{{$member->region}}" class="form-control" />
                        <input type="hidden" name="id" value="{{ $member->id }}" />
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
