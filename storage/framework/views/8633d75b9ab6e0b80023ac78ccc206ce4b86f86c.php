<?php $__env->startSection('title', $data['title']); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="h3"><?php echo e($data['header']); ?></h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-dashboard"></i> Shipments</a></li>
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
            <div class="box-body">
                <table class="table dataTable table-hover table-striped" id="shipment_dataTable">
                    <thead>
                        <tr>
                            <th>Shimpment No.</th>
                            <th>Date Shipping</th>
                            <th>Price</th>
                            <th>To</th>
                            <th>From</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data['shipments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value['shipment_no']); ?></td>
                            <td><?php echo e($value['ship_date']); ?></td>
                            <td><?php echo e($value['price']); ?></td>
                            <td><?php echo e($value['ship_to']); ?></td>
                            <td><?php echo e($value['ship_from']); ?></td>
                            <td>
                                <?php if($value['is_ship'] == 0): ?>
                                <span class="badge badge-warning badge-pill">Pending</span>
                                <?php else: ?>
                                <span class="badge badge-success badge-pill">Success</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(url('view-shipment').'/'.$value['id']); ?>" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> View Info</a>
                                <?php if($value['is_ship'] == 0): ?>
                                <a href="<?php echo e(url('ship-done').'/'.$value['id']); ?>" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Done</a>                                
                                <?php else: ?>
                                <span class="fa fa-check text-success"></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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

    // Init shipment dataTable
    $('#shipment_dataTable').dataTable({
        "pageLength": 10,
        "sort": false
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/shipment/shipments.blade.php ENDPATH**/ ?>