<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CalendarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix(\App\Helpers\Langs::getLocale())->middleware('langs')->group(function () {
    Route::post('/booking', [BookingController::class, 'store']);
});

Route::get('/{cottage}/not-available-days', [CalendarController::class, 'notAvailableDates']);
Route::get('/available-interval', [CalendarController::class, 'availableDatesInterval']);
Route::get('/available-dates-by-month', [CalendarController::class, 'notAvailableDatesByMonth']);
