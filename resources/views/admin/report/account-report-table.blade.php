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
            <div class="box-header with-border">
                <h5 class="box-title">Banco De Oro</h5>
                <h5 class="box-title float-right">1234567890</h5>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered">
                    
                </table>
            </div>
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