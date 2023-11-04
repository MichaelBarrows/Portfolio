<?php

namespace MichaelBarrows\Portfolio\Observers;

use Illuminate\Support\Facades\Notification;
use MichaelBarrows\Portfolio\Models\Contact;
use MichaelBarrows\Portfolio\Notifications\ContactFormNotification;

class ContactObserver
{
    public function created(Contact $contact): void
    {
        Notification::route('slack', config('portfolio.slack_webhook_url'))
            ->notify(new ContactFormNotification($contact));
    }
}
