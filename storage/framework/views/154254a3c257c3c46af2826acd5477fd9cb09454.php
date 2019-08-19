<!DOCTYPE HTML>
<html>
    <head>
        <style>
    @page  { size: 7.62cm 20.32cm landscape; }

    table
        {
            width: 900px;
            font: 16px Calibri;
        }
        table, th, td 
        {
            border:1px ;
            border-collapse: collapse;
            border-spacing: 5px 10px;
          
        }
         </style>
    </head>
    <body>
        <?php

        $formattedNum = number_format($amount, 2);
            ?>
        <table>
            <tbody>
                <tr>
                    <td></td>
                    <td ><?php echo e($date); ?></td>
                </tr>
                <tr>
                    <td>*** <?php echo e($cheque_no); ?> ***</td>
                    <td >*** <?php echo e($formattedNum); ?> ***</td>
                </tr>
                <tr>
                    <td colspan="2"><br>*** <?php echo e($words); ?> ***</td>
                  
                </tr>
            </tbody>
        </table>
    </body>
</html><?php /**PATH C:\xampp\htdocs\new\resources\views/admin/cheque/cheque.blade.php ENDPATH**/ ?>