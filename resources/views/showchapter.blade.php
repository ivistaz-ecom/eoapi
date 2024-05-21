@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chapter Detail') }}</div>
                
                <div class="card-body">
                    <table class="table table-striped mt-4">
                        <tr>
                            <td>Chapter</td>
                            <td>{{ $chapters->chapters }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ $chapters->description }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('edit-chapter', $chapters->id) }}" class="btn btn-primary">Edit Chapter</a>&nbsp;
                    <a href="{{ route('chapters') }}" class="btn btn-primary">All Chapters</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection