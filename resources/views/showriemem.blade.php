@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 style="display:inline">Member Details</h4> <a href="{{ route('rie-members') }}" class="btn btn-primary btn-sm float-right">All Members</a>
            
            <table class="table table-striped mt-4">
                <tr>
                    <td>EO ID</td>
                    <td>{{ $riemember->eoid }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{ $riemember->gender }}</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>{{ $riemember->mobile }}</td>
                </tr>
                <tr>
                    <td>Industry</td>
                    <td>{{ $riemember->industry }}</td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td>{{ $riemember->company }}</td>
                </tr>
                <tr>
                    <td>GST no</td>
                    <td>{{ $riemember->gstno }}</td>
                </tr>
                <tr>
                    <td>Spouse ID</td>
                    <td>{{ $riemember->spouseid }}</td>
                </tr>
                <tr>
                    <td>Registration Status</td>
                    <td>{{ $riemember->regstatus }}</td>
                </tr>
                <tr>
                    <td>Address 1</td>
                    <td>{{ $riemember->addr1 }}</td>
                </tr>
                <tr>
                    <td>Address 2</td>
                    <td>{{ $riemember->addr2 }}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{ $riemember->city }}</td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>{{ $riemember->state }}</td>
                </tr>
                <tr>
                    <td>PIN</td>
                    <td>{{ $riemember->pin }}</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>{{ $riemember->country }}</td>
                </tr>
                <tr>
                    <td>Company Address 1</td>
                    <td>{{ $riemember->comaddr1 }}</td>
                </tr>
                <tr>
                    <td>Company Address 2</td>
                    <td>{{ $riemember->comaddr2 }}</td>
                </tr>
                <tr>
                    <td>Company City</td>
                    <td>{{ $riemember->comcity }}</td>
                </tr>
                <tr>
                    <td>Company State</td>
                    <td>{{ $riemember->comstate }}</td>
                </tr>
                <tr>
                    <td>Company PIN</td>
                    <td>{{ $riemember->compin }}</td>
                </tr>
                <tr>
                    <td>Company Country</td>
                    <td>{{ $riemember->comcountry }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection