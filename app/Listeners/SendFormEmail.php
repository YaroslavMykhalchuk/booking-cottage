<?php

namespace App\Listeners;

use App\Events\FormCreated;
use App\Mail\FormManagerMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendFormEmail
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
    public function handle(FormCreated $event): void
    {
        $form = $event->form;
//        $locale = app()->getLocale();

        Mail::to(config('mail.mailers.from.name'))
            ->locale('en')
            ->send(new FormManagerMail($form));
    }
}
