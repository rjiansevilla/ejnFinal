<?php $__env->startSection('title', $data['title']); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="h3"><?php echo e($data['header']); ?></h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Stations</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form method="POST" action="<?php echo e(url('generate-report')); ?>">
                <?php echo csrf_field(); ?>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <select name="bank" id="bank" class="form-control">
                                <?php $__currentLoopData = $data['banks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value['id']); ?>"><?php echo e($value['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <p class="h5">Account No: <small id="account_number" class="font-weight-bold h5"></small></p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="control-label">Date From</label>
                            <input type="date" name="date_from" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="control-label">Date From</label>
                            <input type="date" name="date_to" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="reset" class="btn btn-primary">RESET</button>
                    <button type="submit" class="btn btn-info"><span class="fa fa-file"></span> PRINT PDF </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function() {

    // Display selected bank account number
    $('#bank').on('change', function() {
        var id = $(this).val();
        
        $.ajax({
            type: "GET",
            url: "/account-number/"+ id,
            success: function(data) {
                $('#account_number').html(data.data.account_no);
            }
        })
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/admin/report/account-report.blade.php ENDPATH**/ ?>