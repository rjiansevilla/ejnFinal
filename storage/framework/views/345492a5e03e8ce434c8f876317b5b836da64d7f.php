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
            <div class="box-body">
                <table class="table dataTable table-hover table-striped" id="transactions_dataTable">
                    <thead>
                        <tr>
                            <th>TRANSACTION NO</th>
                            <th>DATE</th>
                            <th>AGENT</th>
                            <th>SACKS</th>
                            <th>UNIT PRICE</th>
                            <th>TOTAL PRICE</th>
                            <th>AMOUNT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data['transactions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $id = base64_encode($value['id']); ?>
                        <tr>
                            <td><?php echo e($value['transaction_no']); ?></td>
                            <td><?php echo e($value['date']); ?></td>
                            <td><?php echo e($value['agent']); ?></td>
                            <td><?php echo e($value['sacks']); ?></td>
                            <td><?php echo e($value['unit_price']); ?></td>
                            <td><?php echo e($value['total_price']); ?></td>
                            <td><?php echo e($value['amount']); ?></td>
                            <td>
                                <a href="<?php echo e(url('view-transaction').'/'.$id); ?>" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>
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

    // Init DataTable
    $('#transactions_dataTable').dataTable({
        "pageLenght": 10,
        "sort": false
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/transaction/transactions.blade.php ENDPATH**/ ?>