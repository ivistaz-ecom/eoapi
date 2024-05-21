@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <h4 style="display:inline">Add Chapter</h4>
        @if (session('message'))
            <h6 class="text-success">{{ session('message') }}</h6>
        @endif
        <div class="col-md-6 justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('create-chapter') }}">
                        @csrf
                        <label>Chapter</label>
                        <input type="text" name="chapter" class="form-control" />
                        <br />
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" />
                        <br />
                        <input type="submit" name="submit" value="Add Member" class="btn btn-primary" />
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
