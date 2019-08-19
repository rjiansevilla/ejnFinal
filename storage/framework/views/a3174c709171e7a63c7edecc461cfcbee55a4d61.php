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
                <table class="table dataTable table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Account Number</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data['banks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value['name']); ?></td>
                            <td><?php echo e($value['account_no']); ?></td>
                            <td>
                                <a href="<?php echo e(url('edit-bank').'/'.$value['id']); ?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span> EDIT</a>
                                <button type="button" id="delete_bank" data-id="<?php echo e($value['id']); ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> DELETE</button>
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
    // Init Swal
    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
    
    // Init dataTable
    $('.dataTable').dataTable({
        "pageLenght": 10,
        "sort": false,
    })

    $('#delete_bank').on('click', function() {
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to to delete this record!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delte it!'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "GET",
                    url: "/delete-bank/"+ id,
                    success: function(data) {
                        if (data.data.status == "success") {
                            location.reload();
                        }
                    }
                })
            }
        })
    })


})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/bank/banks.blade.php ENDPATH**/ ?>