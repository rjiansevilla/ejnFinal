<?php $__env->startSection('title', $data['title']); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="h3"><?php echo e($data['header']); ?></h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Copra</a></li>
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
            <div class="box-body row">
                <!-- <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $id = base64_encode($value->id); ?> -->
              <!--   <div class="col-md-4">
                    <a href="<?php echo e(url('/transaction-form').'/'.$id); ?>">
                        <div class="small-box bg-blue">
                            <div class="inner">
                            <h3><?php echo e($value->name); ?></h3>
                            <p><?php echo e($value->desc); ?></p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-product-hunt"></i>
                            </div>
                        </div>
                        
                    </a>
                </div> -->
                <!-- <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                 <div class="col-md-4">
                    <a href="<?php echo e(url('/transaction-form').'/'.$id); ?>">
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
                    <a href="<?php echo e(url('/transaction-form.coffee').'/'.$id); ?>">
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
                    <a href="<?php echo e(url('/transaction-form.copra').'/'.$id); ?>">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function() {

})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejnFinal\resources\views/admin/products/products.blade.php ENDPATH**/ ?>