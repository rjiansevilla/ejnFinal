<?php $__env->startSection('title', $data['title']); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="h3"><?php echo e($data['header']); ?></h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Transactions</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h5 class="box-title">List of Transactions</h5>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body row">
                <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="small-box bg-blue">
                            <div class="inner">
                            <h3><?php echo e($value->name); ?></h3>

                            <p><?php echo e($value->desc); ?></p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-product-hunt"></i>
                            </div>
                            <?php
                                $product = $value->id."-".$value->name;
                                $productEncode = base64_encode($product);
                            ?>
                            <a href="<?php echo e(url('/transactions').'/'.$productEncode); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/transaction/transaction-product.blade.php ENDPATH**/ ?>