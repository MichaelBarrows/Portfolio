<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class ContactFormNotification extends Notification
{
    use Queueable;

    public Contact $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function via(): array
    {
        return ['slack'];
    }

    public function toSlack(): SlackMessage
    {
        return (new SlackMessage())
            ->from('MichaelBarrows.com')
            ->attachment(function ($attachment) {
                $attachment->title('New contact form message')
                    ->fields([
                        'From' => $this->contact->name,
                        'Email' => $this->contact->email,
                        'Phone' => $this->contact->phone,
                    ])
                    ->content("-\n{$this->contact->message}\n\n ---")
                    ->color('#0099CC');
            });
    }
}
