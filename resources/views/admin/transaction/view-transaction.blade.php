@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')

@stop

@section('content')
        <?php

        $formattedUnitPrice = number_format( $data['transaction']['unit_price'], 2);
        $formattedTotalPrice = number_format( $data['transaction']['total_price'], 2);
        $formattedAmount = number_format( $data['transaction']['amount'], 2);
        ?>
<style>
@page { size:50.94; margin:0; } </style>
<div class="row">
    <div class="col-md-5">
        <div class="box box-primary">
            <div class="box-body p-3">
                 <h2 style="margin-bottom: -20px; margin-top: -10px;">New Trading Center</h2> <br><p>Lamitan City Basilan</p>
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td class="text-uppercase">Date</td>
                            <td>{{ $data['transaction']['date'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Transaction No.</td>
                            <td>{{ $data['transaction']['transaction_no'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Customer Name</td>
                            <td>{{ $data['transaction']['agent'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Station</td>
                            <td>{{ $data['transaction']['station'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Quality</td>
                            <td>{{ $data['transaction']['quality'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Total Kilos</td>
                            <td>{{ $data['transaction']['sacks'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Gross Weight</td>
                            <td>{{ $data['transaction']['gross'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Net Weight</td>
                            <td>{{ $data['transaction']['net'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Loss</td>
                            <td>{{ $data['transaction']['moisture'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">NTC</td>
                            <td>{{ $data['transaction']['ntc'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Others</td>
                            <td>{{ $data['transaction']['others'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Discount</td>
                            <td>{{ $data['transaction']['discount'] }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Unit Price</td>
                            <td>Php {{ $formattedUnitPrice }}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Total Price</td>
                            <td>Php {{ $formattedTotalPrice}}</td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Amount</td>
                            <td>Php {{ $formattedAmount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-right">
                <a href="{{ url()->previous() }}" id="back-window" class="btn btn-danger">BACK</a>
               <a href="#"  id="print-window" class="btn btn-danger"><span class="fa fa-file"></span> Print</a>
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
// Printing 
$('#print-window').click(function() {
    var printbutton = document.getElementById("print-window");
    var back = document.getElementById ("back-window");
    printbutton.style.visibility ='hidden';
    back.style.visibility='hidden';     
    window.print();
    location.reload();
});

</script>
@stop