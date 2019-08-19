@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Transactions</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <table class="table dataTable table-hover table-striped" id="transactions_dataTable">
                    <thead>
                        <tr>
                            <th>TRANSACTION NO</th>
                            <th>DATE</th>
                            <th>AGENT</th>
                            <th>SACKS</th>
                            <th>UNIT PRICE</th>
                            <th>TOTAL PRICE</th>
                            <th>AMOUNT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['transactions'] as $value)
                        <tr>
                            <td>{{ $value['transaction_no'] }}</td>
                            <td>{{ $value['date'] }}</td>
                            <td>{{ $value['agent'] }}</td>
                            <td>{{ $value['sacks'] }}</td>
                            <td>{{ $value['unit_price'] }}</td>
                            <td>{{ $value['total_price'] }}</td>
                            <td>{{ $value['amount'] }}</td>
                            <td>
                               <!--  <a href="{{ url('view-transaction').'/'.$value['id'] }}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a> -->
                                @if($value['is_issue'] == 0)
                                <a href="{{ url('issue-cheque').'/'.$value['id'] }}" class="btn btn-info btn-sm">Issue Cheque</a>
                                @else
                                <a href="{{ url('issue-voucher').'/'.$value['id'] }}" class="btn btn-warning btn-sm">Issue Voucher</a>
                                @endif
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

    // Init DataTable
    $('#transactions_dataTable').dataTable({
        "pageLenght": 10,
        "sort": false
    })
})
</script>
@stop