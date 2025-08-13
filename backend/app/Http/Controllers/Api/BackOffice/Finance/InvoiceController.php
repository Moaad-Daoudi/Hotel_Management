<?php

namespace App\Http\Controllers\Api\BackOffice\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch and paginate Invoice records.
        // 2. Allow filtering by status ('paid', 'overdue', 'draft') and date range.
        // 3. Return the list as JSON.
    }

    public function show(Invoice $invoice)
    {
        // 1. Eager-load 'invoiceItems', 'booking', and 'guest'.
        // 2. Return the complete invoice object as JSON.
    }
}
