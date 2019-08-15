@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="/users"><i class="fa fa-dashboard"></i> User Management</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> Add User</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form method="POST" action="{{ url('create-user') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="control-label">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="fname" value="{{ old('fname') }}" class="form-control" required>
                        @if ($errors->has('fname'))
                        <div class="error text-danger">{{ $errors->first('fname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lname" value="{{ old('lname') }}" class="form-control" required>
                        @if ($errors->has('lname'))
                        <div class="error text-danger">{{ $errors->first('lname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        @if ($errors->has('email'))
                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" required>
                        @if ($errors->has('password'))
                        <div class="error text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="reset" class="btn btn-danger">RESET</button>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
<script>
$(document).ready(function() {

})
</script>
@stop