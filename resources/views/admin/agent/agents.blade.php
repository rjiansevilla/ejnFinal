@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Agents</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <table class="table dataTable table-hover table-striped trable-bordered">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Mobile</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['agents'] as $value)
                        <tr>
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['mobile'] }}</td>
                            <td>{{ $value['email'] }}</td>
                            <td>{{ $value['address'] }}</td>
                            <td>
                                <a href="{{ url('view-agent').'/'.$value['id'] }}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>
                                <a href="{{ url('edit-agent').'/'.$value['id'] }}" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                                <!-- <a href="{{ url('delete-agent').'/'.$value['id'] }}" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a> -->
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