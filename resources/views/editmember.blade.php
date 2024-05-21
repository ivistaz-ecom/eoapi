@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <h4 style="display:inline">Edit Member</h4>
        @if (session('message'))
            <h6 class="text-success">{{ session('message') }}</h6>
        @endif
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
                        <label>Region</label>
                        <select name="chapter" class="form-control">
                            @foreach ($regions as $region)
                            <option value="{{ $region->id }}" <?php if($member->region == $region->id) echo 'selected'; ?> >{{ $region->region }}</option>
                            @endforeach
                        </select>
                        <br />
                        <label>Chapter</label>
                        <select name="chapter" class="form-control">
                            @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}" <?php if($member->chapter == $chapter->id) echo 'selected'; ?> >{{ $chapter->chapters }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id" value="{{ $member->id }}" />
                        <br />
                        <input type="submit" name="submit" value="Update Member" class="btn btn-primary" />
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
