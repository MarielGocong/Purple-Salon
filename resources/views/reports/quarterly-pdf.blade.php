<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quarterly Sales Report</title>
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
    <div class="report-title">
        Quarterly Sales Report
    </div>

    <table>
        <thead>
            <tr>
                <th>Quarter</th>
                <th>Year</th>
                <th>Quarter Start</th>
                <th>Quarter End</th>
                <th>Total Sales</th>
                <th>Services</th>
                <th>Employees</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->quarter_label }}</td>
                    <td>{{ $report->year }}</td>
                    <td>{{ $report->quarter_start }}</td>
                    <td>{{ $report->quarter_end }}</td>
                    <td>{{ number_format($report->total_sales, 2) }}</td>
                    <td>{{ $report->services }}</td>
                    <td>{{ $report->employees }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <div class="prepared-by">
            <strong>Prepared by:</strong> {{ auth()->user()->name }}<br>
            <strong>Date:</strong> {{ now()->format('F d, Y H:i:s') }}
        </div>
    </div>
</body>
</html>
