@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Add Member') }}</div>

                <div class="card-body">
                    <form action="{{ route('save-data') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" />
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label>Chapter</label>
                                <input type="text" name="chapter" class="form-control" />
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <label>Region</label>
                                <input type="text" name="region" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label>Join Date</label>
                                <input type="date" name="joindt" class="form-control" />
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <label>Industry</label>
                                <input type="text" name="industry" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label>Voucher Amount</label>
                                <input type="text" name="voucher_amt" class="form-control" />
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <label>Expiary Date</label>
                                <input type="date" name="exprdt" class="form-control" />
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <br />
                        <input type="submit" name="submit" value="Save Member" class="btn btn-primary btn-sm" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection