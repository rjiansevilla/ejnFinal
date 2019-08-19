<?php $__env->startSection('title', $data['title']); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="h3"><?php echo e($data['header']); ?></h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="/products"><i class="fa fa-dashboard"></i> Products</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> Transaction Form</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border p-1">
                <h5 class="box-title"><?php echo e($data['date']); ?></h5>
                <button class="btn btn-primary btn-sm float-right" id="agent_modal"><span class="fa fa-plus"></span> ADD AGENT</button>
            </div>
            <form method="POST" action="<?php echo e(url('submit-transaction')); ?>" id="transaction">
                <?php echo csrf_field(); ?>
                <div class="box-body row">
                    <input type="hidden" name="agent_id" id="agent_id">
                    <input type="hidden" name="product_id" value="<?php echo e($data['product_id']); ?>">
                    <div class="form-group col-md-12">
                        <label for="" class="control-label">Agent <span class="text-danger"> *</span></label>
                        <select name="agent_id" id="agents" class="form-control transaction-select2">
                            
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Quality <span class="text-danger"> *</span></label>
                            <select name="quality" value="<?php echo e(old('quality')); ?>" class="form-control" required>
                                <option selected disabled>SELECT QUALITY</option>
                                <option value="Dry">Wet</option>
                                <option value="Bales">Bales</option>
                            </select>
                            <?php if($errors->has('quality')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('quality')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Total Kilos <span class="text-danger"> *</span></label>
                            <input type="Number" name="sacks" value="<?php echo e(old('sacks')); ?>" id="sacks" class="form-control unit-price" placeholder="0" min="0" required>
                            <?php if($errors->has('sacks')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('sacks')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Station <span class="text-danger"> *</span></label>
                            <select name="station_id" value="<?php echo e(old('station')); ?>" class="form-control" required>
                                <option selected disabled>SELECT STATION</option>
                                <?php $__currentLoopData = $data['stations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $station): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($station['id']); ?>"><?php echo e($station['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('station_id')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('station_id')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Gross Weight <span class="text-danger"> *</span></label>
                            <input type="text" id="gross_weight" name="gross_weight" value="<?php echo e(old('gross_weight')); ?>" class="form-control gross_weight" placeholder="0.00" >
                            <?php if($errors->has('gross_weight')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('gross_weight')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Net Weight <span class="text-danger"> *</span></label>
                            <input type="text" id="net_weight" name="net_weight" value="<?php echo e(old('net_weight')); ?>" class="form-control net_weight" placeholder="0.00" >
                            <?php if($errors->has('net_weight')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('net_weight')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Loss <span class="text-danger"> *</span></label>
                            <input type="text" name="moisture" value="<?php echo e(old('moisture')); ?>" class="form-control" class="form-control moisture" id="moisture" disabled>
                            <!-- <select name="moisture" value="<?php echo e(old('moisture')); ?>" class="form-control" class="form-control" id="moisture"> -->
                                
                            <?php if($errors->has('moisture')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('moisture')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Unit Price <span class="text-danger"> *</span></label>
                            <input type="number" name="unit_price" value="<?php echo e(old('unit_price')); ?>" id="unit_price" class="form-control unit-price" placeholder="0.00" min="0" required>
                            <?php if($errors->has('unit_price')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('unit_price')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Total Price <span class="text-danger"> *</span></label>
                            <input type="hidden" name="total_price" value="<?php echo e(old('total_price')); ?>" id="total_price">
                            <input type="text"  class="form-control" placeholder="0.00" id="total" disabled>
                            <?php if($errors->has('total_price')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('total_price')); ?></div>
                            <?php endif; ?>
                        </div>
                        <h5 class="text-muted text-uppercase">Less</h5>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">NTC <span class="text-danger"> *</span></label>
                            <input type="text" name="ntc" id="ntc" value="<?php echo e(old('ntc')); ?>" class="form-control less" placeholder="0.00">
                            <?php if($errors->has('ntc')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('ntc')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Others</label>
                            <input type="text" id="others" name="others" value="<?php echo e(old('others')); ?>" class="form-control less" placeholder="0.00">
                            <?php if($errors->has('others')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('others')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <!-- <label for="" class="control-label mb-0">Discount <span class="text-danger"> *</span></label>
                            <input type="hidden" name="discount" value="0" id="discount">
                            <input type="text" value="" class="form-control" placeholder="0.00" id="discounted"  disabled> -->
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
                        <input type="text" name="fname" value="<?php echo e(old('fname')); ?>" class="form-control" placeholder="FIRST NAME" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="lname" value="<?php echo e(old('lname')); ?>" class="form-control" placeholder="LAST NAME" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="number" name="mobile" value="<?php echo e(old('mobile')); ?>" class="form-control" placeholder="MOBILE NUMBER" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="EMAIL ADDRESS" required>
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="address" value="<?php echo e(old('address')); ?>" class="form-control" rows="3" placeholder="ADDRESS..." required></textarea>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
    // $('#moisture').on('change', function() {
    //     var discount = $(this).val();
    //     $('#discount').val(discount);
    //     $('#discounted').val(discount);
    // })

    // LOSS Computation
    $('.net_weight').on("keyup", function() {
         var gross = $('input[name="gross_weight"]').val();
         var net = $('input[name="net_weight"]').val();
         moisture = gross - net ;
         $('#moisture').val(moisture.toFixed(2));
     })

    // Compute total price
    $('.unit-price').on("keyup", function() {
        var unit = $('input[name="unit_price"]').val();
        var sacks = $('input[name="sacks"]').val();
        var ntc = $('input[name="ntc"]').val();
        var others = $('input[name="others"]').val();
        // var discount = $('input[name="discount"]').val();
        total = (unit * sacks);
        less = ntc + others ;
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejnFinal\resources\views/admin/products/transaction-form.blade.php ENDPATH**/ ?>