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
        @if (\Session::has('status'))
        <div class="alert {{ (\Session::get('status') == 'success')? 'alert-success' : 'alert:danger' }} alert-dismissible fade show" role="alert">
            <strong>{{ \Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="box box-primary">
            <div class="box-body">
                <table class="table dataTable table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Account Number</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['banks'] as $value)
                        <tr>
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['account_no'] }}</td>
                            <td>
                                <a href="{{ url('edit-bank').'/'.$value['id'] }}" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> EDIT</a>
                                <button type="button"  data-id="{{ $value['id'] }}" class="btn btn-danger btn-sm delete_bank"><span class="fa fa-trash"></span> DELETE</button>
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
    // Init Swal
    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
    
    // Init dataTable
    $('.dataTable').dataTable({
        "pageLenght": 10,
        "sort": false,
    })

    $('.delete_bank').on('click', function() {
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
                    url: "/delete-bank/"+ id,
                    success: function(data) {
                        if (data.data.status == "success") {
                            location.reload();
                        }
                    }
                })
            }
        })
    })


})
</script>
@stop