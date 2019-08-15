@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Issue Cheque</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h5 class="box-title">Issue Cheque Transactions</h5>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body row">
                @foreach($data['products'] as $value)
                    <div class="col-md-4">
                        <div class="small-box bg-navy">
                            <div class="inner">
                            <h3>{{ $value->name }}</h3>

                            <p>{{ $value->desc }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-product-hunt"></i>
                            </div>
                            <a href="{{ url('/cheque-list').'/'.$value['id'] }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endforeach
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

})
</script>
@stop