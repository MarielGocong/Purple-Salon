<x-dashboard>
    <div class="p-4 sm:ml-64">
        <div class="flex justify-between mx-7">
            <h2 class="text-2xl font-bold text-salonPurple">Annual Sales Report</h2>
            <a href="{{ route('annual.report.pdf') }}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                Download PDF
            </a>
        </div>
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500 overflow-x-scroll min-w-screen">
        <thead class="bg-gray-50">
            <tr>
                <th>Year</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Sales</th>
                <th>Services Rendered</th>
                <th>Employees Involved</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->year }}</td>
                <td>{{ $report->year_start }}</td>
                <td>{{ $report->year_end }}</td>
                <td>{{ number_format($report->total_sales, 2) }}</td>
                <td>{{ $report->services }}</td>
                <td>{{ $report->employees }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</x-dashboard>

