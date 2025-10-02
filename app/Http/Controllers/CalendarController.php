<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetDatesByMonth;
use App\Http\Requests\GetStartDateRequest;
use App\Models\Booking;
use App\Services\CalendarService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct(CalendarService $calendarService)
    {
        $this->calendarService = $calendarService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function notAvailableDates(int $cottage)
    {
        if($cottage != 0 && $cottage != 1){
            abort(404);
        }

        $notAvailableDates = $this->calendarService->notAvailableDates($cottage);
        return response()->json($notAvailableDates);
    }

    public function availableDatesInterval(GetStartDateRequest $request)
    {
        $date_from = $request->validated()['from'];
        $cottage = $request->validated()['cottage'];
        $cottage = (int)$cottage;

        $interval = $this->calendarService->availableDatesInterval($date_from, $cottage);

        return response()->json($interval);
    }

    public function notAvailableDatesByMonth(GetDatesByMonth $request)
    {
        $cottage = $request->validated()['cottage'];
        $year = $request->validated()['year'];
        $month = $request->validated()['month'];

        $notAvailableDates = $this->calendarService->notAvailableDatesByMonth($cottage, $year, $month);

        return response()->json($notAvailableDates);
    }
}
