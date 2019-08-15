@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Payee</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <table class="table dataTable table-hover table-striped" id="logs_dataTable">
                    <thead>
                        <tr>
                            <th>CHEQUE NO.</th>
                            <th>PAYEE</th>
                            <th>BANK</th>
                            <th>AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach($data ['cheque'] as $value)
            <tr>
                <td>{{ $value['cheque_no'] }}</td>
                <td>{{ $value['agent_id'] }}</td>
                <td>{{ $value['name'] }}</td>
                <td>{{ $value['amount'] }}</td>
            </tr>
            @endforeach
        </tbody>
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
    // Init logs DataTable
    $('#logs_dataTable').dataTable({
        "pageLength": 10,
        "sort": false
    });
})
</script>
@stop