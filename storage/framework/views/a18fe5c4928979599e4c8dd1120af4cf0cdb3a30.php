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
                            <td class="text-uppercase">Date</td>
                            <td><?php echo e($data['transaction']['date']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Transaction No.</td>
                            <td><?php echo e($data['transaction']['transaction_no']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Agent</td>
                            <td><?php echo e($data['transaction']['agent']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Station</td>
                            <td><?php echo e($data['transaction']['station']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Quality</td>
                            <td><?php echo e($data['transaction']['quality']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Sacks</td>
                            <td><?php echo e($data['transaction']['sacks']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Gross Weight</td>
                            <td><?php echo e($data['transaction']['gross']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Net Weight</td>
                            <td><?php echo e($data['transaction']['net']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Moisture</td>
                            <td><?php echo e($data['transaction']['moisture']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">NTC</td>
                            <td><?php echo e($data['transaction']['ntc']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Others</td>
                            <td><?php echo e($data['transaction']['others']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Discount</td>
                            <td><?php echo e($data['transaction']['discount']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Unit Price</td>
                            <td><?php echo e($data['transaction']['unit_price']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Total Price</td>
                            <td><?php echo e($data['transaction']['total_price']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Amount</td>
                            <td><?php echo e($data['transaction']['amount']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-right">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger">BACK</a>
<!--                <a href="<?php echo e(url('transaction-report')); ?>" class="btn btn-sm"><span class="fa fa-file"></span> Print</a> -->
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/admin/transaction/view-transaction.blade.php ENDPATH**/ ?>