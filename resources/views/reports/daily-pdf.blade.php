<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .report-title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
        }
        .prepared-by {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Daily Sales Report</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Sales</th>
                <th>Services Rendered</th>
                <th>Employees Involved</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->date }}</td>
                <td>{{ number_format($report->total_sales, 2) }}</td>
                <td>{{ $report->services }}</td>
                <td>{{ $report->employees }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p><strong>Prepared By:</strong> {{ $preparedBy }}</p>
        <p><strong>Report Date & Time:</strong> {{ $currentDateTime }}</p>
    </div>
</body>
</html>
