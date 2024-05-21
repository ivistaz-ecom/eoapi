@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <h4 style="display:inline">Edit Chapter</h4>
        @if (session('message'))
            <h6 class="text-success">{{ session('message') }}</h6>
        @endif
        <div class="col-md-6 justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('update-chapter') }}">
                        @csrf
                        <label>Chapter</label>
                        <input type="text" name="chapter" value="{{$chapters->chapters}}" class="form-control" />
                        <br />
                        <label>Description</label>
                        <input type="text" name="description" value="{{$chapters->description}}" class="form-control" />
                        <input type="hidden" name="id" value="{{ $chapters->id }}" />
                        <br />
                        <input type="submit" name="submit" value="Update Member" class="btn btn-primary" />
                    </form>
                    {{ $chapters }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
