@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Member Details</h4> <a href="{{ route('rie-members') }}" class="btn btn-primary btn-sm float-right">All Members</a>
            
            <table class="table table-striped mt-4">
                {{$riemember}}
                @foreach ($riemember as $k => $v)
                <tr>
                    <td>{{ $k }}</td>
                    <td>{{ $v }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection