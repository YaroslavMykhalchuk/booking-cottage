<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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
}
