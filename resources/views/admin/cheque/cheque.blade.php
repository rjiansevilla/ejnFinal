<!DOCTYPE HTML>
<html>
    <head>
        <style>
    @page { size: 7.62cm 21.59cm landscape; }

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
                    <td align="left">{{ $date }}</td>
                </tr>
                <tr>
                    <td>*** {{ $cheque_no }} ***</td>
                    <td >*** {{ $formattedNum }} ***</td>
                </tr>
                <tr>
                    <td colspan="2"><br>*** {{ $words }} ***</td>
                  
                </tr>
            </tbody>
        </table>
    </body>
</html>