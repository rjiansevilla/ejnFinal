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
            <form method="POST" action="{{ url('generate-report') }}">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <select name="bank" id="bank" class="form-control">
                                @foreach($data['banks'] as $value)
                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <p class="h5">Account No: <small id="account_number" class="font-weight-bold h5"></small></p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="control-label">Date From</label>
                            <input type="date" name="date_from" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="control-label">Date From</label>
                            <input type="date" name="date_to" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="reset" class="btn btn-primary">RESET</button>
                    <button type="submit" class="btn btn-info"><span class="fa fa-file"></span> PRINT PDF </button>
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

    // Display selected bank account number
    $('#bank').on('change', function() {
        var id = $(this).val();
        
        $.ajax({
            type: "GET",
            url: "/account-number/"+ id,
            success: function(data) {
                $('#account_number').html(data.data.account_no);
            }
        })
    })
})
</script>
@stop