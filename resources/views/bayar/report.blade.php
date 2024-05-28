<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payments Report</title>
    <style>
        /* Gaya CSS untuk laporan PDF */
        /* Anda dapat menyesuaikan gaya ini sesuai kebutuhan Anda */
    </style>
</head>
<body>
    <h1>Payments Report</h1>
    <table>
        <thead>
            <tr>
                <th>NO.</th>
                <th>Order ID</th>
                <th>Payment Date</th>
                <th>Payment Method</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $idx => $data)
            <tr>
                <td>{{ $idx + 1 }}</td>
                <td>{{ $data->order_id }}</td>
                <td>{{ $data->payment_date }}</td>
                <td>{{ $data->payment_method }}</td>
                <td>{{ $data->amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
