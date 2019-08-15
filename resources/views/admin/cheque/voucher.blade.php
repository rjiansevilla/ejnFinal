<!DOCTYPE HTML>
<html>
    <head>
 <style>
   
         @page { size: 27.94cm 10.8cm landscape; }
    table
        {
            width:100%;
            font: 13px Calibri;
        }
        table, th, td 
        {
            border:0px solid black;
            border-collapse: collapse;
            border-spacing: 0px ;
          
        }
         </style>
    </head>
    <body>
         <?php

        $formattedNum = number_format($amount, 2);
            ?>
    <h4 style="margin-bottom: -20px; margin-top: -10px;">New Trading Center</h4>
    <p>Lamitan City Basilan</p>
    <hr style="margin-top: -10px;">
    <h4 style="text-align:center">VOUCHER</h4>
        <table>
            <tbody>
                <tr>
                    <td></td>
                    <td> Date: {{ $date }}</td>
                   
                </tr>
                <tr>
                    <td></td>
                     <td>Trans #: {{ $transaction_no }}</td>
                </tr>
                <tr>
                    <td>Payee: {{ $agent }}</td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td>Cheque No: {{ $cheque_no }}</td>
                </tr>
                <tr>
                    <td>Amount: P{{ $formattedNum }}</td>
                </tr>
                 <tr>
                    <td>Bank: {{ $bank }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Recipient:______________</td>
                </tr>
                 <tr>
                    <td colspan="2"><hr></td>
                </tr>
                  <tr>
                    <td>Approved By:______________</td>
                    <td>CV No:______________</td>
                </tr>
                 <tr>
                    <td>Recorded By:______________</td>
                    <td>Book No:______________</td>
                </tr>
            </tbody>
        </table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
        <h4 style="margin-bottom: -20px; margin-top: -10px;">New Trading Center</h4>
    <p>Lamitan City Basilan</p>
    <hr style="margin-top: -10px;">
    <h4 style="text-align:center">VOUCHER</h4>
        <table>
            <tbody>
                <tr>
                    <td></td>
                    <td> Date: {{ $date }}</td>
                   
                </tr>
                <tr>
                    <td></td>
                     <td>Trans #: {{ $transaction_no }}</td>
                </tr>
                <tr>
                    <td>Payee: {{ $agent }}</td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td>Cheque No: {{ $cheque_no }}</td>
                </tr>
                <tr>
                    <td>Amount: P{{ $formattedNum }}</td>
                </tr>
                 <tr>
                    <td>Bank: {{ $bank }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Recipient:______________</td>
                </tr>
                 <tr>
                    <td colspan="2"><hr></td>
                </tr>
                  <tr>
                    <td>Approved By:______________</td>
                    <td>CV No:______________</td>
                </tr>
                 <tr>
                    <td>Recorded By:______________</td>
                    <td>Book No:______________</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>