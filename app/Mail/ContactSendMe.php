<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendMe extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $address = 'no-reply@michaelbarrows.com';
        $subject = 'Contact form message (' . $this->data['name'] . ')';
        $name = 'michaelbarrows.com';

        return $this->view('emails.contact.send_to_me')
                    ->from($address, $name)
                    ->replyTo($this->data['email_address'], $this->data['name'])
                    ->subject($subject)
                    ->with(['name' => $this->data['name'],
                            'email_address' => $this->data['email_address'],
                            'phone_number' => $this->data['phone_number'],
                            'user_message' => $this->data['user_message']]);
    }
}
