@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Copra</a></li>
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
            <div class="box-body row">
                <!-- @foreach($data['products'] as $value)
                @php $id = base64_encode($value->id); @endphp -->
              <!--   <div class="col-md-4">
                    <a href="{{ url('/transaction-form').'/'.$id }}">
                        <div class="small-box bg-blue">
                            <div class="inner">
                            <h3>{{ $value->name }}</h3>
                            <p>{{ $value->desc }}</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-product-hunt"></i>
                            </div>
                        </div>
                        
                    </a>
                </div> -->
                <!-- @endforeach -->
                 <div class="col-md-4">
                    <a href="{{ url('/transaction-form').'/'.$id }}">
                        <div class="small-box bg-blue">
                            <div class="inner">
                            <h3>Rubber</h3>
                            <p>New Rubber Transaction</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-th-list"></i>
                            </div>
                        </div>
                     </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/transaction-form.coffee').'/'.$id }}">
                        <div class="small-box bg-blue">
                            <div class="inner">
                            <h3>Coffee</h3>
                            <p>New Coffee Transaction</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-coffee"></i>
                            </div>
                        </div>
                     </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/transaction-form.copra').'/'.$id }}">
                        <div class="small-box bg-blue">
                            <div class="inner">
                            <h3>Copra</h3>
                            <p>New Copra Transaction</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-random"></i>
                            </div>
                        </div>
                     </a>
                </div>
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