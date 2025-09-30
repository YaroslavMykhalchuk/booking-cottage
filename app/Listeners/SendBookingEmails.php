<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Mail\BookingManagerMail;
use App\Mail\BookingUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendBookingEmails
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookingCreated $event): void
    {
        $booking = $event->booking;
        $locale = app()->getLocale();

        Mail::to($booking->email)
            ->locale($locale)
            ->send(new BookingUserMail($booking));

        Mail::to(config('mail.mailers.from.name'))
            ->locale('en')
            ->send(new BookingManagerMail($booking));
    }
}
