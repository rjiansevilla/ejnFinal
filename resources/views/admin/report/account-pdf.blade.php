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
    <p style="float: right;">{{ $date }}</p>
    <h2 style="margin-bottom: -20px; margin-top: -10px;">New Trading Center</h2>
    <p>Lamitan City Basilan</p>
    <hr style="margin-top: -10px;">
    
    <p style="margin-bottom: -15px; font-weight: bold;">{{ $bank }}</p>
    <p style="margin-bottom: -15px; font-weight: bold;">Account #: {{ $account }}</p>
    <p style="font-weight: bold;">Date:  <small>{{ $request['date_from'] }} - {{ $request['date_to'] }}</small></p>
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
            @foreach($data as $value)
            <tr>
                <td>{{ $value['date'] }}</td>
                <td>{{ $value['payee'] }}</td>
                <td>{{ $value['cheque_no'] }}</td>
                <td>{{ $value['amount'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p style="float: right; font-weight: bold;">Total: Php {{ $amount }}</p>
</body>
</HTML>