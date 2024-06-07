@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">All Members</h4> <a href="" class="btn btn-primary btn-sm float-right">All Members</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <td>EO ID</td>
                        <td>Industry</td>
                        <td>Company</td>
                        <td>Country</td>
                        <td>Reg Status</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                @foreach ($riemembers as $riemember)
                <tr>
                    <td>{{ $riemember->eoid }}</td>
                    <td>{{ $riemember->industry }}</td>
                    <td>{{ $riemember->company }}</td>
                    <td>{{ $riemember->country }}</td>
                    <td>{{ $riemember->regstatus }}</td>
                    <td><a href="{{ route('rie-member', $riemember->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href=""><i class="bi bi-pencil"></i></a>&nbsp;<a href="" onclick="return confirm('Are you sure you want to delete this member?');"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
            {!! $riemembers->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection