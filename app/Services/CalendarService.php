<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Exceptions\HttpResponseException;

class CalendarService
{
    public function notAvailableDates($cottage)
    {
        $cottage = (int)$cottage;

        $today = Carbon::today()->toDateString();

        $notAvailableDateRows = Booking::query()
        ->where('cottage', $cottage)
        ->where('date_to', '>', $today)
        ->select('date_from', 'date_to')
        ->get();

        $notAvailableDates = [];
        foreach ($notAvailableDateRows as $notAvailableDateRow) {
            $period = CarbonPeriod::between($notAvailableDateRow->date_from, $notAvailableDateRow->date_to)->excludeEndDate();
            foreach ($period as $date) {
                $notAvailableDates[] = $date->format('Y-m-d');
            }
        }

        return $notAvailableDates;
    }

    public function availableDatesInterval($date_from, $cottage)
    {
        $start_interval = Carbon::parse($date_from)->toDateString();

        $end_interval = Booking::query()
            ->where('cottage', $cottage)
            ->where('date_from', '>', $start_interval)
            ->orderBy('date_from')
            ->value('date_from');

        if(!empty($end_interval)){
            return ['from' => $start_interval, 'to' => $end_interval];
        }

        return ['from' => $start_interval, 'to' => null];
    }

    public function notAvailableDatesByMonth(int $cottage, int $year, int $month)
    {
        if($cottage != 0 && $cottage != 1){
            abort(404);
        }
        if($month < 1 || $month > 12) {
            throw new HttpResponseException(
                response()->json(['error' => 'This year is invalid'], 422)
            );
        }

        $startMonth = Carbon::create($year, $month, 1);
        $endMonth = $startMonth->copy()->addMonth();

        $dates_rows = Booking::query()
            ->where('cottage', $cottage)
            ->where('date_to', '>', $startMonth->toDateString())
            ->where('date_from', '<', $endMonth->toDateString())
            ->select('date_from', 'date_to')
            ->get();


        $notAvailableDates = [];
        foreach ($dates_rows as $date_row) {
            $period = CarbonPeriod::between($date_row->date_from, $date_row->date_to)->excludeEndDate();
            foreach ($period as $date) {
                $notAvailableDates[] = $date->format('Y-m-d');
            }
        }

        return $notAvailableDates;
    }
}
