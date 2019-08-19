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
    <!-- <p style="float: right;"><?php echo e($date); ?></p> -->
    <h2 style="margin-bottom: -20px; margin-top: -10px;">New Trading Center</h2>
    <p>Lamitan City Basilan</p>
    <hr style="margin-top: -10px;">

    <table>
        <thead>
            <tr>
               <!--  <th>Date</th> -->
                <th>Payee</th>
                <th>Cheque #</th>
                <th>Bank</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <!-- <td><?php echo e($value['date']); ?></td> -->
                <td><?php echo e($value['payee']); ?></td>
                <td><?php echo e($value['cheque_no']); ?></td>
                <td><?php echo e($value['bank']); ?></td>
                <td><?php echo e($value['amount']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</HTML><?php /**PATH C:\xampp\htdocs\new\resources\views/admin/transaction/transaction-report.blade.php ENDPATH**/ ?>