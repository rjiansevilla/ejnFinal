@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Shipment</a></li>
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
            <div class="box-header with-border">
                <h5 class="box-title">Shipment Details</h5>
                <h5 class="box-title float-right">{{ $data['date'] }}</h5>
            </div>
            <form method="POST" action="{{ url('create-shipment') }}">
                @csrf
                <div class="box-body row">
                    <div class="col-md-6">
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Van No. <span class="text-danger"> *</span></label>
                            <input type="text" name="van_no" value="{{ old('van_no') }}" class="form-control" required>
                            @if ($errors->has('van_no'))
                            <div class="error text-danger">{{ $errors->first('van_no') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">BL No. <span class="text-danger"> *</span></label>
                            <input type="number" name="bl_no" value="{{ old('bl_no') }}" class="form-control" required>
                            @if ($errors->has('bl_no'))
                            <div class="error text-danger">{{ $errors->first('bl_no') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">From <span class="text-danger"> *</span></label>
                            <input type="text" name="ship_from" value="{{ old('ship_from') }}" class="form-control" required>
                            @if ($errors->has('ship_from'))
                            <div class="error text-danger">{{ $errors->first('ship_from') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">To <span class="text-danger"> *</span></label>
                            <input type="text" name="ship_to" value="{{ old('ship_to') }}" class="form-control" required>
                            @if ($errors->has('ship_to'))
                            <div class="error text-danger">{{ $errors->first('ship_to') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Shipping Date <span class="text-danger"> *</span></label>
                            <input type="date" name="ship_date" value="{{ old('ship_date') }}" class="form-control" required>
                            @if ($errors->has('ship_date'))
                            <div class="error text-danger">{{ $errors->first('ship_date') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Price <span class="text-danger"> *</span></label>
                            <input type="number" name="price" value="{{ old('price') }}" class="form-control" required>
                            @if ($errors->has('price'))
                            <div class="error text-danger">{{ $errors->first('price') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Bales <span class="text-danger"> *</span></label>
                            <input type="number" name="bales" value="{{ old('bales') }}" class="form-control">
                            @if ($errors->has('bales'))
                            <div class="error text-danger">{{ $errors->first('bales') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">KLS <span class="text-danger"> *</span></label>
                            <input type="number" name="kls" value="{{ old('kls') }}" class="form-control">
                            @if ($errors->has('kls'))
                            <div class="error text-danger">{{ $errors->first('kls') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Others <span class="text-danger"> *</span></label>
                            <input type="number" name="others" value="{{ old('others') }}" class="form-control">
                            @if ($errors->has('others'))
                            <div class="error text-danger">{{ $errors->first('others') }}</div>
                            @endif
                        </div>
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
    // Init select2
    $('.select2').select2();
})
</script>
@stop