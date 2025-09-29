<?php

namespace App\Services;

use App\Events\BookingCreated;
use App\Models\Booking;
use Carbon\Carbon;
use GuzzleHttp\Promise\RejectionException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function create(array $data)
    {
        $date_from = Carbon::parse($data['date_from'])->toDateTimeString();
        $date_to = Carbon::parse($data['date_to'])->toDateTimeString();

        if($date_to <= $date_from || $date_from <= Carbon::now()->toDateTimeString()) {
            throw new HttpResponseException(
                response()->json(['error' => 'This dates is not available for booking'], 422)
            );
        }

        $cottage = (int)$data['cottage'];

        if (!$this->isIntersects($date_from, $date_to, $cottage)) {
            $booking = Booking::query()->create([
                'cottage' => $cottage,
                'date_from' => $date_from,
                'date_to' => $date_to,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'note' => $data['note'] ?? null,
            ]);

            event(new BookingCreated($booking));
        } else {
            throw new HttpResponseException(
                response()->json(['error' => 'This dates is not available for booking'], 422)
            );
        }
    }

    private function isIntersects($date_from, $date_to, $cottage)
    {
        return Booking::query()
            ->where('cottage', $cottage)
            ->where('date_from', '<', $date_to)
            ->where('date_to', '>', $date_from)
            ->exists();
    }
}
