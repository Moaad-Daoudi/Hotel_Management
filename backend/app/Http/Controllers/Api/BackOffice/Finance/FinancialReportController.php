<?php

namespace App\Http\Controllers\Api\BackOffice\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
    public function show(Request $request)
    {
        // 1. Validate the request: 'report_type' (e.g., 'revenue', 'occupancy'), 'start_date', 'end_date'.
        // 2. Use a switch statement on the 'report_type'.
        // 3. For 'revenue' report:
        //    a. Query the Payments table.
        //    b. Sum the 'amount' where 'processed_at' is between the start and end dates.
        //    c. Group the results by day or month for a chart.
        // 4. For 'occupancy' report:
        //    a. Calculate the total number of rooms in the hotel.
        //    b. For each day in the date range, count the number of 'occupied' rooms.
        //    c. Calculate the occupancy percentage for each day.
        // 5. Return the generated report data as JSON.
    }
}
