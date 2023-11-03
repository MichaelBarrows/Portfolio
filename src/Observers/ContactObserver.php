<?php

namespace MichaelBarrows\Portfolio\Observers;

use App\Notifications\ContactFormNotification;
use Illuminate\Support\Facades\Notification;
use MichaelBarrows\Portfolio\Models\Contact;

class ContactObserver
{
    public function created(Contact $contact): void
    {
        Notification::route('slack', config('slack.contact_notification_webhook_url'))
            ->notify(new ContactFormNotification($contact));
    }
}
