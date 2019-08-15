@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Stations</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (\Session::has('status'))
        <div class="alert {{ (\Session::get('status') == 'success')? 'alert-success' : 'alert:danger' }} alert-dismissible fade show" role="alert">
            <strong>{{ \Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="box box-primary">
            <form method="POST" action="{{ url('submit-agent') }}">
                @csrf
                <div class="box-body row">
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="fname" value="{{ old('fname') }}" class="form-control" required>
                        @if ($errors->has('fname'))
                        <div class="error text-danger">{{ $errors->first('fname') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lname" value="{{ old('lname') }}" class="form-control" required>
                        @if ($errors->has('lname'))
                        <div class="error text-danger">{{ $errors->first('lname') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Mobile No. <span class="text-danger">*</span></label>
                        <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control" required>
                        @if ($errors->has('mobile'))
                        <div class="error text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="control-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        @if ($errors->has('email'))
                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="control-label">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" value="{{ old('address') }}" class="form-control" required>
                        @if ($errors->has('address'))
                        <div class="error text-danger">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                </div>
                <div class="box-footer p-1 text-right">
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