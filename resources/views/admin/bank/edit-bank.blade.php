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
        <div class="box box-primary">
            <form method="GET" action="{{ url('update-bank').'/'.$data['bank']['id'] }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="control-label">Bank Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $data['bank']['name'] }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Account Number <span class="text-danger">*</span></label>
                        <input type="number" name="account_no" value="{{ $data['bank']['account_no'] }}" class="form-control" required>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ url()->previous() }}" class="btn btn-danger">CANCEL</a>
                    <button type="submit" class="btn btn-primary">UPDATE</button>
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