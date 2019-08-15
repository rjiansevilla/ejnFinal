@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> User Management</a></li>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['users'] as $value)
                        <tr>
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['email'] }}</td>
                            <td><span class="badge badge-primary badge-pill">Super Administrator</span></td>
                            <td><span class="badge badge-success badge-pill">Active</span></td>
                            <td>
                                <button type="button" data-id="{{ $value['id'] }}"  class="btn btn-danger btn-sm delete_user"><span class="fa fa-trash"></span></button>
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

    // Delete user
    $('.delete_user').on('click', function() {
        var id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to to delete this record!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delte it!'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "GET",
                    url: "/delete-user/"+ id,
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