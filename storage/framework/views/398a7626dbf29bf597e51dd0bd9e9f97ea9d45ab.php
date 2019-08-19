<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="jwt-token" content="<?php echo e(!empty(Auth::user())?Auth::user()->jwt_token:''); ?>">

    <title><?php echo $__env->yieldContent('title_prefix', config('adminlte.title_prefix', '')); ?>
<?php echo $__env->yieldContent('title', config('adminlte.title', 'AdminLTE 2')); ?>
<?php echo $__env->yieldContent('title_postfix', config('adminlte.title_postfix', '')); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/arjel.css')); ?>" />
    <!-- Bootstrap 3.3.7 -->
    <!--link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css')); ?>"-->
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css')); ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/dist/css/AdminLTE.min.css')); ?>">

    <?php echo $__env->yieldContent('adminlte_css'); ?>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition <?php echo $__env->yieldContent('body_class'); ?>">

<?php echo $__env->yieldContent('body'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>

<!-- Sweet Alert js -->
<script type="text/javascript" src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>

<!-- <script type="text/javascript" src="<?php echo e(asset('js/twilio.js')); ?>"></script> -->
<script src="<?php echo e(asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js')); ?>"></script>

<?php if(config('adminlte.plugins.chartjs')): ?>
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
<?php endif; ?>

<?php echo $__env->yieldContent('adminlte_js'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\ejn\ej\resources\views/vendor/adminlte/master.blade.php ENDPATH**/ ?>