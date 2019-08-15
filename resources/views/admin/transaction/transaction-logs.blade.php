@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Transaction Logs</a></li>
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
                            <th>NAME</th>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>PRODUCT</th>
                            <th>IP ADDRESS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['logs'] as $value)
                        <tr>
                            <td>{{ $value['user'] }}</td>
                            <td>{{ $value['date'] }}</td>
                            <td>{{ $value['time'] }}</td>
                            <td>{{ $value['product'] }}</td>
                            <td>{{ $value['ip'] }}</td>
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