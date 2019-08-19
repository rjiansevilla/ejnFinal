<?php $__env->startSection('title', $data['title']); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="h3"><?php echo e($data['header']); ?></h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Shipment</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <?php if(\Session::has('status')): ?>
        <div class="alert <?php echo e((\Session::get('status') == 'success')? 'alert-success' : 'alert:danger'); ?> alert-dismissible fade show" role="alert">
            <strong><?php echo e(\Session::get('message')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h5 class="box-title">Shipment Details</h5>
                <h5 class="box-title float-right"><?php echo e($data['date']); ?></h5>
            </div>
            <form method="POST" action="<?php echo e(url('create-shipment')); ?>">
                <?php echo csrf_field(); ?>
                <div class="box-body row">
                    <div class="col-md-6">
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Van No. <span class="text-danger"> *</span></label>
                            <input type="text" name="van_no" value="<?php echo e(old('van_no')); ?>" class="form-control" required>
                            <?php if($errors->has('van_no')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('van_no')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">BL No. <span class="text-danger"> *</span></label>
                            <input type="number" name="bl_no" value="<?php echo e(old('bl_no')); ?>" class="form-control" required>
                            <?php if($errors->has('bl_no')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('bl_no')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">From <span class="text-danger"> *</span></label>
                            <input type="text" name="ship_from" value="<?php echo e(old('ship_from')); ?>" class="form-control" required>
                            <?php if($errors->has('ship_from')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('ship_from')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">To <span class="text-danger"> *</span></label>
                            <input type="text" name="ship_to" value="<?php echo e(old('ship_to')); ?>" class="form-control" required>
                            <?php if($errors->has('ship_to')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('ship_to')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Shipping Date <span class="text-danger"> *</span></label>
                            <input type="date" name="ship_date" value="<?php echo e(old('ship_date')); ?>" class="form-control" required>
                            <?php if($errors->has('ship_date')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('ship_date')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Price <span class="text-danger"> *</span></label>
                            <input type="number" name="price" value="<?php echo e(old('price')); ?>" class="form-control" required>
                            <?php if($errors->has('price')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('price')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Bales <span class="text-danger"> *</span></label>
                            <input type="number" name="bales" value="<?php echo e(old('bales')); ?>" class="form-control">
                            <?php if($errors->has('bales')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('bales')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">KLS <span class="text-danger"> *</span></label>
                            <input type="number" name="kls" value="<?php echo e(old('kls')); ?>" class="form-control">
                            <?php if($errors->has('kls')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('kls')); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-1">
                            <label for="" class="control-label mb-0">Others <span class="text-danger"> *</span></label>
                            <input type="number" name="others" value="<?php echo e(old('others')); ?>" class="form-control">
                            <?php if($errors->has('others')): ?>
                            <div class="error text-danger"><?php echo e($errors->first('others')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="reset" class="btn btn-danger">RESET</button>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
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
    // Init select2
    $('.select2').select2();
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/admin/shipment/shipment-transaction.blade.php ENDPATH**/ ?>