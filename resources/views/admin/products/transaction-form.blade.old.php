@extends('adminlte::page')

@section('title', $data['title'])

@section('content_header')
<h1 class="h3">{{ $data['header'] }}</h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="/products"><i class="fa fa-dashboard"></i> Products</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> Transaction Form</a></li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border p-1">
                <h5 class="box-title">{{ $data['date'] }}</h5>
                <button class="btn btn-primary btn-sm float-right" id="agent_modal"><span class="fa fa-plus"></span> ADD AGENT</button>
            </div>
            <form method="POST" action="{{ url('submit-transaction') }}" id="transaction">
                @csrf
                <div class="box-body row">
                    <input type="hidden" name="agent_id" id="agent_id">
                    <input type="hidden" name="product_id" value="{{ $data['product_id'] }}">
                    <div class="form-group col-md-12">
                        <label for="" class="control-label">Agent <span class="text-danger"> *</span></label>
                        <select name="agent_id" id="agents" class="form-control transaction-select2">
                            
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Quality <span class="text-danger"> *</span></label>
                            <select name="quality" value="{{ old('quality') }}" class="form-control" required>
                                <option selected disabled>SELECT QUALITY</option>
                                <option value="Dry">Wet</option>
                                <option value="Wet">Bales</option>
                            </select>
                            @if ($errors->has('quality'))
                            <div class="error text-danger">{{ $errors->first('quality') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Total Kilos <span class="text-danger"> *</span></label>
                            <input type="Number" name="sacks" value="{{ old('sacks') }}" id="sacks" class="form-control unit-price" placeholder="0" min="0" required>
                            @if ($errors->has('sacks'))
                            <div class="error text-danger">{{ $errors->first('sacks') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Station <span class="text-danger"> *</span></label>
                            <select name="station_id" value="{{ old('station') }}" class="form-control" required>
                                <option selected disabled>SELECT STATION</option>
                                @foreach($data['stations'] as $station)
                                <option value="{{ $station['id'] }}">{{ $station['name'] }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('station_id'))
                            <div class="error text-danger">{{ $errors->first('station_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Gross Weight <span class="text-danger"> *</span></label>
                            <input type="number" name="gross_weight" value="{{ old('gross_weight') }}" class="form-control" placeholder="0.00" min="0" required>
                            @if ($errors->has('gross_weight'))
                            <div class="error text-danger">{{ $errors->first('gross_weight') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Net Weight <span class="text-danger"> *</span></label>
                            <input type="number" name="net_weight" value="{{ old('net_weight') }}" class="form-control" placeholder="0.00" min="0" required>
                            @if ($errors->has('net_weight'))
                            <div class="error text-danger">{{ $errors->first('net_weight') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Moisture <span class="text-danger"> *</span></label>
                            <select name="moisture" value="{{ old('moisture') }}" class="form-control" class="form-control" id="moisture">
                                <option value="0.0">Select Moisture</option>
                                <option value="0.0">6.0</option>
                                <option value="0.1">6.1</option>
                                <option value="0.2">6.2</option>
                                <option value="0.3">6.3</option>
                                <option value="0.4">6.4</option>
                                <option value="0.5">6.5</option>
                                <option value="0.6">6.6</option>
                                <option value="0.7">6.7</option>
                                <option value="0.8">6.8</option>
                                <option value="0.9">6.9</option>
                                <option value="1.0">7.0</option>
                                <option value="1.1">7.1</option>
                                <option value="1.2">7.2</option>
                                <option value="1.3">7.3</option>
                                <option value="1.4">7.4</option>
                                <option value="1.5">7.5</option>
                                <option value="1.6">7.6</option>
                                <option value="1.7">7.7</option>
                                <option value="1.8">7.8</option>
                                <option value="1.9">7.9</option>
                                <option value="2.0">8.0</option>
                                <option value="2.1">8.1</option>
                                <option value="2.2">8.2</option>
                                <option value="2.3">8.3</option>
                                <option value="2.4">8.4</option>
                                <option value="2.5">8.5</option>
                                <option value="2.6">8.6</option>
                                <option value="2.7">8.7</option>
                                <option value="2.8">8.8</option>
                                <option value="2.9">8.9</option>
                                <option value="3.1">9.0</option>
                                <option value="3.4">9.1</option>
                                <option value="3.6">9.2</option>
                                <option value="3.7">9.3</option>
                                <option value="3.8">9.4</option>
                                <option value="3.9">9.5</option>
                                <option value="4.0">9.6</option>
                                <option value="4.1">9.7</option>
                                <option value="4.2">9.8</option>
                                <option value="4.3">9.9</option>
                                <option value="4.7">10.0</option>
                                <option value="4.8">10.1</option>
                                <option value="4.9">10.2</option>
                                <option value="5.0">10.3</option>
                                <option value="5.1">10.4</option>
                                <option value="5.2">10.5</option>
                                <option value="5.3">10.6</option>
                                <option value="5.4">10.7</option>
                                <option value="5.5">10.8</option>
                                <option value="5.6">10.9</option>
                                <option value="5.8">11.0</option>
                                <option value="6.0">11.1</option>
                                <option value="6.1">11.2</option>
                                <option value="6.2">11.3</option>
                                <option value="6.3">11.4</option>
                                <option value="6.4">11.5</option>
                                <option value="6.5">11.6</option>
                                <option value="6.6">11.7</option>
                                <option value="6.7">11.8</option>
                                <option value="6.8">11.9</option>
                                <option value="5.8">11.0</option>
                                <option value="7.1">12.0</option>
                                <option value="7.2">12.1</option>
                                <option value="7.3">12.2</option>
                                <option value="7.4">12.3</option>
                                <option value="7.5">12.4</option>
                                <option value="7.6">12.5</option>
                                <option value="7.7">12.6</option>
                                <option value="7.8">12.7</option>
                                <option value="7.9">12.8</option>
                                <option value="8.0">12.9</option>
                                <option value="8.6">13.0</option>
                                <option value="8.7">13.1</option>
                                <option value="8.8">13.2</option>
                                <option value="8.9">13.3</option>
                                <option value="9.1">13.4</option>
                                <option value="8.2">13.5</option>
                                <option value="8.3">13.6</option>
                                <option value="8.4">13.7</option>
                                <option value="8.5">13.8</option>
                                <option value="8.0">13.9</option>
                                <option value="9.6">14.0</option>
                                <option value="9.8">14.1</option>
                                <option value="9.9">14.2</option>
                                <option value="10.0">14.3</option>
                                <option value="10.1">14.4</option>
                                <option value="10.2">14.5</option>
                                <option value="10.4">14.6</option>
                                <option value="10.5">14.7</option>
                                <option value="10.6">14.8</option>
                                <option value="10.7">14.9</option>
                                <option value="10.8">15.0</option>
                                <option value="11.1">15.1</option>
                                <option value="11.2">15.2</option>
                                <option value="11.3">15.3</option>
                                <option value="11.4">15.4</option>
                                <option value="11.6">15.5</option>
                                <option value="11.7">15.6</option>
                                <option value="11.8">15.7</option>
                                <option value="12.1">15.8</option>
                                <option value="12.2">15.9</option>
                                <option value="12.3">16.0</option>
                                <option value="12.4">16.1</option>
                                <option value="12.5">16.2</option>
                                <option value="12.6">16.3</option>
                                <option value="12.7">16.4</option>
                                <option value="12.9">16.5</option>
                                <option value="13.0">16.6</option>
                                <option value="13.1">16.7</option>
                                <option value="13.2">16.8</option>
                                <option value="13.3">16.9</option>
                                <option value="13.4">17.0</option>
                                <option value="14.0">17.1</option>
                                <option value="14.1">17.2</option>
                                <option value="14.2">17.3</option>
                                <option value="14.3">17.4</option>
                                <option value="14.5">17.5</option>
                                <option value="14.6">17.6</option>
                                <option value="14.7">17.7</option>
                                <option value="14.8">17.8</option>
                                <option value="14.9">17.9</option>
                                <option value="15.0">18.0</option>
                                <option value="15.6">18.1</option>
                                <option value="15.7">18.2</option>
                                <option value="15.8">18.3</option>
                                <option value="15.9">18.4</option>
                                <option value="16.1">18.5</option>
                                <option value="16.2">18.6</option>
                                <option value="16.3">18.7</option>
                                <option value="16.4">18.8</option>
                                <option value="16.5">18.9</option>
                                <option value="16.6">19.0</option>
                                <option value="17.2">19.1</option>
                                <option value="17.3">19.2</option>
                                <option value="17.4">19.3</option>
                                <option value="17.5">19.4</option>
                                <option value="17.7">19.5</option>
                                <option value="17.8">19.6</option>
                                <option value="17.9">19.7</option>
                                <option value="18.0">19.8</option>
                                <option value="18.1">19.9</option>
                                <option value="18.2">20.0</option>
                                <option value="18.6">20.1</option>
                                <option value="20.2">20.2</option>
                                <option value="20.3">20.3</option>
                                <option value="20.4">20.4</option>
                                <option value="20.5">20.5</option>
                                <option value="20.6">20.6</option>
                                <option value="20.7">20.7</option>
                                <option value="20.8">20.8</option>
                                <option value="20.9">20.9</option>
                                <option value="21.0">21.0</option>
                                <option value="21.1">21.1</option>
                                <option value="21.2">21.2</option>
                                <option value="21.3">21.3</option>
                                <option value="21.4">21.4</option>
                                <option value="21.5">21.5</option>
                                <option value="21.6">21.6</option>
                                <option value="21.7">21.7</option>
                                <option value="21.8">21.8</option>
                                <option value="21.9">21.9</option>
                                <option value="22.0">22.0</option>
                                <option value="22.1">22.1</option>
                                <option value="22.2">22.2</option>
                                <option value="22.3">22.3</option>
                                <option value="22.4">22.4</option>
                                <option value="22.5">22.5</option>
                                <option value="22.6">22.6</option>
                                <option value="22.7">22.7</option>
                                <option value="22.8">22.8</option>
                                <option value="22.9">22.9</option>
                                <option value="23.0">23.0</option>
                                <option value="23.1">23.1</option>
                                <option value="23.2">23.2</option>
                                <option value="23.3">23.3</option>
                                <option value="23.4">23.4</option>
                                <option value="23.5">23.5</option>
                                <option value="23.6">23.6</option>
                                <option value="23.7">23.7</option>
                                <option value="23.8">23.8</option>
                                <option value="23.9">23.9</option>
                                <option value="24.0">24.0</option>
                                <option value="24.1">24.1</option>
                                <option value="24.2">24.2</option>
                                <option value="24.3">24.3</option>
                                <option value="24.4">24.4</option>
                                <option value="24.5">24.5</option>
                                <option value="24.6">24.6</option>
                                <option value="24.7">24.7</option>
                                <option value="24.8">24.8</option>
                                <option value="24.9">24.9</option>
                                <option value="25.0">25.0</option>
                                <option value="25.1">25.1</option>
                                <option value="25.2">25.2</option>
                                <option value="25.3">25.3</option>
                                <option value="25.4">25.4</option>
                                <option value="25.5">25.5</option>
                                <option value="25.6">25.6</option>
                                <option value="25.7">25.7</option>
                                <option value="25.8">25.8</option>
                                <option value="25.9">25.9</option>
                                <option value="26.0">26.0</option>
                                <option value="26.1">26.1</option>
                                <option value="26.2">26.2</option>
                                <option value="26.3">26.3</option>
                                <option value="26.4">26.4</option>
                                <option value="26.5">26.5</option>
                                <option value="26.6">26.6</option>
                                <option value="26.7">26.7</option>
                                <option value="26.8">26.8</option>
                                <option value="26.9">26.9</option>
                                <option value="27.0">27.0</option>
                                <option value="27.1">27.1</option>
                                <option value="27.2">27.2</option>
                                <option value="27.3">27.3</option>
                                <option value="27.4">27.4</option>
                                <option value="27.5">27.5</option>
                                <option value="27.6">27.6</option>
                                <option value="27.7">27.7</option>
                                <option value="27.8">27.8</option>
                                <option value="27.9">27.9</option>
                                <option value="28.0">28.0</option>
                                <option value="28.1">28.1</option>
                                <option value="28.2">28.2</option>
                                <option value="28.3">28.3</option>
                                <option value="28.4">28.4</option>
                                <option value="28.5">28.5</option>
                                <option value="28.6">28.6</option>
                                <option value="28.7">28.7</option>
                                <option value="28.8">28.8</option>
                                <option value="28.9">28.9</option>
                                <option value="0.0">Goma Discount</option>
                                <option value="0.7">10.0</option>
                                <option value="1.4">15.0</option>
                                <option value="1.8">20.0</option>
                                <option value="2.3">25.0</option>
                                <option value="2.8">30.0</option>
                                <option value="3.6">40.0</option>
                                <option value="5.1">50.0</option>
                                <option value="0.0">60.0</option>
                            </select>
                            @if ($errors->has('moisture'))
                            <div class="error text-danger">{{ $errors->first('moisture') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Unit Price <span class="text-danger"> *</span></label>
                            <input type="number" name="unit_price" value="{{ old('unit_price') }}" id="unit_price" class="form-control unit-price" placeholder="0.00" min="0" required>
                            @if ($errors->has('unit_price'))
                            <div class="error text-danger">{{ $errors->first('unit_price') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Total Price <span class="text-danger"> *</span></label>
                            <input type="hidden" name="total_price" value="{{ old('total_price') }}" id="total_price">
                            <input type="text"  class="form-control" placeholder="0.00" id="total" disabled>
                            @if ($errors->has('total_price'))
                            <div class="error text-danger">{{ $errors->first('total_price') }}</div>
                            @endif
                        </div>
                        <h5 class="text-muted text-uppercase">Less</h5>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">NTC <span class="text-danger"> *</span></label>
                            <input type="text" name="ntc" id="ntc" value="{{ old('ntc') }}" class="form-control less" placeholder="0.00">
                            @if ($errors->has('ntc'))
                            <div class="error text-danger">{{ $errors->first('ntc') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Others</label>
                            <input type="text" id="others" name="others" value="{{ old('others') }}" class="form-control less" placeholder="0.00">
                            @if ($errors->has('others'))
                            <div class="error text-danger">{{ $errors->first('others') }}</div>
                            @endif
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Discount <span class="text-danger"> *</span></label>
                            <input type="hidden" name="discount" value="0" id="discount">
                            <input type="text" value="" class="form-control" placeholder="0.00" id="discounted"  disabled>
                        </div>
                        <hr>
                        <div class="form-group mb-1">
                            <input type="hidden" name="amount" value="0" id="amount">
                            <h5 class="text-muted font-weight-bold d-inline">TOTAL: </h5>
                            <h4 class="font-weight-bold float-right d-inline" id="total_amount">Php 0.00</h4>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right p-1">
                <button type="button" class="btn btn-danger" id="transaction_return">CANCEL</button>
                <button type="submit" class="btn btn-primary">SUBMIT TRANSACTION</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="agentModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h5 class="font-weight-bold">ADD NEW AGENTS</h5>
                <hr>
                <form id="agent_form" class="row">
                    <div class="form-group col-md-12">
                        <input type="text" name="fname" value="{{ old('fname') }}" class="form-control" placeholder="FIRST NAME" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="lname" value="{{ old('lname') }}" class="form-control" placeholder="LAST NAME" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="MOBILE NUMBER" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="EMAIL ADDRESS" required>
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="address" value="{{ old('address') }}" class="form-control" rows="3" placeholder="ADDRESS..." required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">CANCEL</button>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary btn-block mb-0">SAVE</button>
                    </div>
                </form>
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
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Less
    $('.less').on('keyup', function() {
        var ntc = $('input[name="ntc"]').val() || 0;
        var others = $('input[name="others"]').val() || 0;
        var discount = $('input[name="discount"]').val() || 0;
        var totalPrice = $('input[name="total_price"]').val();
        less = parseInt(ntc) + parseInt(discount) + parseInt(others);
        amount = totalPrice - less;
        $('#total_amount').html(amount.toFixed(2));
        $('#amount').val(amount.toFixed(2));
       
    })

    // Moisture
    $('#moisture').on('change', function() {
        var discount = $(this).val();
        $('#discount').val(discount);
        $('#discounted').val(discount);
    })

    // Compute total price
    $('.unit-price').on("keyup", function() {
        var unit = $('input[name="unit_price"]').val();
        var sacks = $('input[name="sacks"]').val();
        var ntc = $('input[name="ntc"]').val();
        var others = $('input[name="others"]').val();
        var discount = $('input[name="discount"]').val();
        total = (unit * sacks);
        less = ntc + others + discount;
        $('#total_price').val(total);
        $('#total').val(total);
        amount = total - less;
        $('#total_amount').html(amount.toFixed(2));
        $('#amount').val(amount.toFixed(2));
      
   })

    // Display and Get all agents
    function displayAgents()
    {
        $.ajax({
            type: "GET",
            url: "/get-agents",
            success: function(data) {
                var row = '';

                $.each(data.data, function(key, value) {
                    row += `<option value="${value.id}">${value.name}</option>`;
                });

                $('#agents').html(row);
            }
        })
    }

    // Load agent display
    displayAgents();

    // Submit agent form
    $('#agent_form').on('submit', function(e) {
        e.preventDefault();
        
        var fname = $('input[name="fname"]').val();
        var lname = $('input[name="lname"]').val();
        var email = $('input[name="email"]').val();
        var mobile = $('input[name="mobile"]').val();
        var address = $('textarea[name="address"]').val();

        var dataToSend = {
            "_token": csrfToken,
            "fname": fname,
            "lname": lname,
            "mobile": mobile,
            "email": email,
            "address": address
        }

        $.ajax({
            type: "POST",
            url: "/add-agent",
            data: dataToSend,
            success: function(data) {
                if (data.data.status = "success") {
                    $('#agent_form')[0].reset();
                    $('#agentModal').modal("hide");

                    displayAgents();
                }
            }
        })
    })

    // Launch modal agent form
    $('#agent_modal').on('click', function() {
        $('#agentModal').modal("show");
    });

    // Init select2
    $('.transaction-select2').select2();
})
</script>
@stop