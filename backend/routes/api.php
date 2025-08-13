<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Publicly Accessible Routes
// Route::post('/booking', [BookingController::class, 'store']); // A guest making a booking

// Route::middleware(['auth:sanctum'])->group(function () {

//     // Guest Self-Service (must be authenticated and have the 'guest' role)
//     Route::middleware('role:guest')->group(function () {
//         Route::get('/my-bill', [BillingController::class, 'show'])->can('self-service');
//         Route::post('/service-request', [ServiceRequestController::class, 'store'])->can('self-service');
//     });

//     // Housekeeping Routes
//     Route::patch('/rooms/{room}/status', [RoomStatusController::class, 'update'])
//          ->middleware('permission:manage housekeeping');

//     // Maintenance Routes
//     Route::get('/maintenance/requests', [MaintenanceRequestController::class, 'index'])
//          ->middleware('permission:manage maintenance');

//     // Restaurant Routes
//     Route::post('/orders', [OrderController::class, 'store'])
//          ->middleware('permission:manage restaurant');

//     // Receptionist Routes
//     Route::middleware('permission:manage bookings')->group(function () {
//         Route::post('/check-in', [CheckInController::class, 'store']);
//         Route::post('/check-out', [CheckOutController::class, 'store']);
//         Route::get('/bookings', [BookingController::class, 'index']);
//     });

//     // Finance Routes
//     Route::middleware('permission:manage finances')->group(function () {
//         Route::get('/invoices', [InvoiceController::class, 'index']);
//         Route::get('/financial-reports', [FinancialReportController::class, 'generate']);
//     });

//     // Hotel Owner / Administrator Routes
//     // Using the 'hotel-owner' role which has all permissions
//     Route::middleware('role:hotel-owner')->group(function () {
//         Route::get('/analytics/full-report', [AnalyticsController::class, 'fullReport']);
//         Route::apiResource('staff', StaffController::class);
//         Route::apiResource('rooms', RoomController::class);
//     });
// });
