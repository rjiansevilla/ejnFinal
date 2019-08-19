<?php $__env->startSection('title', $data['title']); ?>

<?php $__env->startSection('content_header'); ?>
<h1 class="h3"><?php echo e($data['header']); ?></h1>
<ol class="breadcrumb">
	<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="/users"><i class="fa fa-dashboard"></i> User Management</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> Add User</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form method="POST" action="<?php echo e(url('create-user')); ?>">
                <?php echo csrf_field(); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="control-label">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="fname" value="<?php echo e(old('fname')); ?>" class="form-control" required>
                        <?php if($errors->has('fname')): ?>
                        <div class="error text-danger"><?php echo e($errors->first('fname')); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="lname" value="<?php echo e(old('lname')); ?>" class="form-control" required>
                        <?php if($errors->has('lname')): ?>
                        <div class="error text-danger"><?php echo e($errors->first('lname')); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" required>
                        <?php if($errors->has('email')): ?>
                        <div class="error text-danger"><?php echo e($errors->first('email')); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control" required>
                        <?php if($errors->has('password')): ?>
                        <div class="error text-danger"><?php echo e($errors->first('password')); ?></div>
                        <?php endif; ?>
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

})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/admin/user/create-user.blade.php ENDPATH**/ ?>