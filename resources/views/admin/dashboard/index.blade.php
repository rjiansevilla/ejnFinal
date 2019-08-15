@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
		<div class="col-md-4">
			<div class="small-box bg-navy">
				<div class="inner">
					<h3>{{ $data['shipToday'] }}</h3>
					<p>Shipment Today</p>
				</div>
				<div class="icon">
					<i class="fa fa-truck"></i>
				</div>
				<a href="{{ url('shipment-today') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="small-box bg-blue">
				<div class="inner">
					<h3>{{ $data['myTransaction'] }}</h3>
					<p>My Transaction</p>
				</div>
				<div class="icon">
					<i class="fa fa-list"></i>
				</div>
				<i href="" class="small-box-footer"> <br> </i>
			</div>
		</div>
		<div class="col-md-4">
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{ $data['users'] }}</h3>
					<p>Users</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="{{ url('users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
    </div>
@stop