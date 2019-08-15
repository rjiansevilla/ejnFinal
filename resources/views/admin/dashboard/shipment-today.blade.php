@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Shipment Today</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <table class="table dataTable table-hover table-striped" id="shipment_dataTable">
                    <thead>
                        <tr>
                            <th>Shimpment No.</th>
                            <th>Date Shipping</th>
                            <th>Price</th>
                            <th>To</th>
                            <th>From</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['shipments'] as $value)
                        <tr>
                            <td>{{ $value['shipment_no'] }}</td>
                            <td>{{ $value['ship_date'] }}</td>
                            <td>{{ $value['price'] }}</td>
                            <td>{{ $value['ship_to'] }}</td>
                            <td>{{ $value['ship_from'] }}</td>
                            <td>
                                @if($value['status'] == 0)
                                <span class="badge badge-warning badge-pill">Pending</span>
                                @else
                                <span class="badge badge-success badge-pill">Success</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('view-shipment').'/'.$value['id'] }}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> View Info</a>
                                <a href="{{ url('ship-done').'/'.$value['id'] }}" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Done</a>
                            </td>
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
    $('.dataTable').dataTable({
        "pageLenght": 10,
        "sort": false
    })
})
</script>
@stop