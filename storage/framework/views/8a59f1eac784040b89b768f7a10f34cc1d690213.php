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
            <div class="box-body">
                <table class="table dataTable table-hover table-striped bordered">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Address</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data['stations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value['name']); ?></td>
                            <td><?php echo e($value['address']); ?></td>
                            <td>
                                <a href="<?php echo e(url('view-station').'/'.$value['id']); ?>" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>
                                <a href="<?php echo e(url('edit-station').'/'.$value['id']); ?>" class="btn btn-info btn-sm"><span class="fa fa-edit"></span></a>
                                <button type="button" data-id="<?php echo e($value['id']); ?>"  class="btn btn-danger btn-sm delete-station"><span class="fa fa-trash"></span></button>
                                <!-- <a href="<?php echo e(url('delete-station').'/'.$value['id']); ?>" id="delete-station" class="btn btn-danger btn-sm "><span class="fa fa-trash"></span></a> -->
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

    // Delete user
    $('.delete-station').on('click', function() {
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
                    url: "/delete-station/"+ id,
                    success: function(data) {
                        if (data.data.status == "success") {
                            location.reload();
                        }
                    }
                })
            }
        })
    })

    // Init dataTable
    $('.dataTable').dataTable({
        "pageLenght": 10,
        "sort": false,
    })
})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/station/stations.blade.php ENDPATH**/ ?>