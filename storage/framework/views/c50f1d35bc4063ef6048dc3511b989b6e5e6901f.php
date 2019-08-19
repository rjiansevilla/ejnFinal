<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
		<div class="col-md-4">
			<div class="small-box bg-navy">
				<div class="inner">
					<h3><?php echo e($data['shipToday']); ?></h3>
					<p>Shipment Today</p>
				</div>
				<div class="icon">
					<i class="fa fa-truck"></i>
				</div>
				<a href="<?php echo e(url('shipment-today')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="small-box bg-blue">
				<div class="inner">
					<h3><?php echo e($data['myTransaction']); ?></h3>
					<p>My Transaction</p>
				</div>
				<div class="icon">
					<i class="fa fa-list"></i>
				</div>
				<a href="<?php echo e(url('my-transaction')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?php echo e($data['users']); ?></h3>
					<p>Users</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="<?php echo e(url('users')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>