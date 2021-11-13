<?php

namespace App\Observers;

use App\Models\Contact;
use App\Notifications\ContactFormNotification;
use Illuminate\Support\Facades\Notification;

class ContactObserver
{
    public function created(Contact $contact): void
    {
        Notification::route('slack', config('slack.contact_notification_webhook_url'))
            ->notify(new ContactFormNotification($contact));
    }
}
