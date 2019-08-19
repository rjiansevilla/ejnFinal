<!DOCTYPE HTML>
<HTML>
<head>
    <style>
        table,thead, tbody, th, tr, td {
            border: 1px solid #000;
            width: 100%;
        }
    </style>
</head>
<body>
    <p style="float: right;"><?php echo e($date); ?></p>
    <h2 style="margin-bottom: -20px; margin-top: -10px;">New Trading Center</h2>
    <p>Lamitan City Basilan</p>
    <hr style="margin-top: -10px;">
    
    <p style="margin-bottom: -15px; font-weight: bold;"><?php echo e($bank); ?></p>
    <p style="margin-bottom: -15px; font-weight: bold;">Account #: <?php echo e($account); ?></p>
    <p style="font-weight: bold;">Date:  <small><?php echo e($request['date_from']); ?> - <?php echo e($request['date_to']); ?></small></p>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Payee</th>
                <th>Cheque #</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($value['date']); ?></td>
                <td><?php echo e($value['payee']); ?></td>
                <td><?php echo e($value['cheque_no']); ?></td>
                <td><?php echo e($value['amount']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <p style="float: right; font-weight: bold;">Total: Php <?php echo e($amount); ?></p>
</body>
</HTML><?php /**PATH C:\xampp\htdocs\new\resources\views/admin/report/account-pdf.blade.php ENDPATH**/ ?>