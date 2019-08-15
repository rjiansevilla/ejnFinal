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
            <form method="POST" action="{{ url('payee-report') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="control-label">Agents</label>
                        <select name="agent" class="form-control select2">
                            @foreach($data['agents'] as $value)
                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="reset" class="btn btn-primary">RESET</button>
                    <button type="submit" class="btn btn-info"><span class="fa fa-file"></span> VIEW PDF </button>
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
    $('.select2').select2();
})
</script>
@stop