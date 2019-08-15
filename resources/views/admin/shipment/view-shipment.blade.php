@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')

@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body p-3">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="text-uppercase">Shipment No</td>
                            <td>{{ $data['shipment']['shipment_no'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Date</td>
                            <td>{{ $data['shipment']['date'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Van No.</td>
                            <td>{{ $data['shipment']['van_no'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Bl No.</td>
                            <td>{{ $data['shipment']['bl_no'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">From</td>
                            <td>{{ $data['shipment']['ship_from'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">To</td>
                            <td>{{ $data['shipment']['ship_to'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Price</td>
                            <td>{{ $data['shipment']['price'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Shipping Date</td>
                            <td>{{ $data['shipment']['ship_date'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Bale</td>
                            <td>{{ $data['shipment']['bales'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">kls</td>
                            <td>{{ $data['shipment']['kls'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Others</td>
                            <td>{{ $data['shipment']['others'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-right">
                <a href="{{ url()->previous() }}" class="btn btn-danger">BACK</a>
                <button class="btn btn-primary">PRINT</button>
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