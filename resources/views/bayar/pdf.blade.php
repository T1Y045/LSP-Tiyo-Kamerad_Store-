<!DOCTYPE html>
<html>
<head>
    <title>Payments PDF</title>
    <style>
        /* Style sesuai kebutuhan untuk tampilan PDF */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>List of Sales</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Payment Date</th>
                <th>Payment Method</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAmount = 0;
            @endphp
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->order_id }}</td>
                <td>{{ $payment->payment_date }}</td>
                <td>{{ $payment->payment_method }}</td>
                <td>{{ $payment->amount }}</td>
                @php
                    $totalAmount += $payment->amount;
                @endphp
            </tr>
            @endforeach
            <tr>
                <td colspan="3">Total Amount:</td>
                <td>{{ $totalAmount }}</td>
            </tr>
            <tr>
                <td colspan="3">Purchases:</td>
                <td>{{ $purchaseTotal }}</td>
            </tr>
            <tr>
                <td colspan="3">Net Total:</td>
                <td>{{ $totalAmount - $purchaseTotal }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
