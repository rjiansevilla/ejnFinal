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
            <div class="box-body">
                <table class="table dataTable table-hover table-striped bordered">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Address</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['stations'] as $value)
                        <tr>
                            <td>{{ $value['name']}}</td>
                            <td>{{ $value['address']}}</td>
                            <td>
                                
                                
                               <button type="button"  data-id="{{ $value['id'] }}" class="btn btn-danger btn-sm delete_station"><span class="fa fa-trash"></span> DELETE</button>
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

    // Delete station
    $('.delete_station').on('click', function() {
        var id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to to delete this record!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "GET",
                    url: "/delete-station/"+ id,
                    success: function(data) {
                        if (data.data.status == "success") {
                            location.reload();
                        }
                    }
                })
            }
        })
    })

    // Init dataTable
    $('.dataTable').dataTable({
        "pageLenght": 10,
        "sort": false,
    })
})
</script>
@stop