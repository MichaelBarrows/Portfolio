<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class ContactFormNotification extends Notification
{
    use Queueable;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack()
    {
        return (new SlackMessage())
            ->from('MichaelBarrows.com')
            ->attachment(function ($attachment) {
                $attachment->title('New contact form message')
                    ->fields([
                        'From' => $this->contact->name,
                        'Email' => $this->contact->email_address,
                        'Phone' => $this->contact->phone_number,
                    ])
                    ->content("-\n{$this->contact->message}\n-")
                    ->color('#38c172');
            });
    }
}
