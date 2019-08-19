<?php $__env->startSection('title', $data['title']); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <?php

        $formattedUnitPrice = number_format( $data['transaction']['unit_price'], 2);
        $formattedTotalPrice = number_format( $data['transaction']['total_price'], 2);
        $formattedAmount = number_format( $data['transaction']['amount'], 2);
        ?>
<style>
@page  { size:50.94; margin:0; } </style>
<div class="row">
    <div class="col-md-5">
        <div class="box box-primary">
            <div class="box-body p-3">
                 <h2 style="margin-bottom: -20px; margin-top: -10px;">New Trading Center</h2> <br><p>Lamitan City Basilan</p>
                <table class="table table-bordered table-sm">
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
                            <td class="text-uppercase">Customer Name</td>
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
                            <td class="text-uppercase">Total Kilos</td>
                            <td><?php echo e($data['transaction']['sacks']); ?></td>
                        </tr>
                        <tr>
<!--                             <td class="text-uppercase">Gross Weight</td>
                            <td><?php echo e($data['transaction']['gross']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Net Weight</td>
                            <td><?php echo e($data['transaction']['net']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Loss</td>
                            <td><?php echo e($data['transaction']['moisture']); ?></td>
                        </tr> -->
                        <tr>
                            <td class="text-uppercase">NTC</td>
                            <td><?php echo e($data['transaction']['ntc']); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Others</td>
                            <td><?php echo e($data['transaction']['others']); ?></td>
                        </tr>
<!--                         <tr>
                            <td class="text-uppercase">Discount</td>
                            <td><?php echo e($data['transaction']['discount']); ?></td>
                        </tr> -->
                        <tr>
                            <td class="text-uppercase">Unit Price</td>
                            <td>Php <?php echo e($formattedUnitPrice); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Total Price</td>
                            <td>Php <?php echo e($formattedTotalPrice); ?></td>
                        </tr>
                        <tr>
                            <td class="text-uppercase">Amount</td>
                            <td>Php <?php echo e($formattedAmount); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-right">
                <a href="<?php echo e(url()->previous()); ?>" id="back-window" class="btn btn-danger">BACK</a>
               <a href="#"  id="print-window" class="btn btn-danger"><span class="fa fa-file"></span> Print</a>
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
// Printing 
$('#print-window').click(function() {
    var printbutton = document.getElementById("print-window");
    var back = document.getElementById ("back-window");
    printbutton.style.visibility ='hidden';
    back.style.visibility='hidden';     
    window.print();
    location.reload();
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/admin/transaction/view-transaction-coffee.blade.php ENDPATH**/ ?>