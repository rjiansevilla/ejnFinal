<?php $__env->startSection('title', $data['title']); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body p-3">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="text-uppercase">Shipment No</td>
                            <td><?php echo e($data['shipment']['shipment_no']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Date</td>
                            <td><?php echo e($data['shipment']['date']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Van No.</td>
                            <td><?php echo e($data['shipment']['van_no']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Bl No.</td>
                            <td><?php echo e($data['shipment']['bl_no']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">From</td>
                            <td><?php echo e($data['shipment']['ship_from']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">To</td>
                            <td><?php echo e($data['shipment']['ship_to']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Price</td>
                            <td><?php echo e($data['shipment']['price']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Shipping Date</td>
                            <td><?php echo e($data['shipment']['ship_date']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Bale</td>
                            <td><?php echo e($data['shipment']['bales']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">kls</td>
                            <td><?php echo e($data['shipment']['kls']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Others</td>
                            <td><?php echo e($data['shipment']['others']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-right">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger">BACK</a>
                <button class="btn btn-primary">PRINT</button>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/shipment/view-shipment.blade.php ENDPATH**/ ?>