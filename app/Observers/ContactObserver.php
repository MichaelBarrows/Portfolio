<?php

namespace App\Observers;

use App\Models\Contact;
use App\Notifications\ContactFormNotification;
use Illuminate\Support\Facades\Notification;

class ContactObserver
{
    public function created(Contact $contact): void
    {
        Notification::route('slack', config('slack.contact_notification_slack_webhook_url'))
            ->notify(new ContactFormNotification($contact));
    }

    public function updated(Contact $contact)
    {
        //
    }

    public function deleted(Contact $contact)
    {
        //
    }

    public function restored(Contact $contact)
    {
        //
    }

    public function forceDeleted(Contact $contact)
    {
        //
    }
}
