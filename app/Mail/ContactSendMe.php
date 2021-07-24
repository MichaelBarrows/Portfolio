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

    public function __construct($data)
    {
        $this->data = $data;
        $this->userName = $this->data['name'];
        $this->emailAddress = $this->data['email_address'];
        $this->phoneNumber = $this->data['phone_number'];
        $this->userMessage = $this->data['user_message'];
    }

    public function build()
    {
        $address = 'no-reply@michaelbarrows.com';
        $subject = 'Contact form message (' . $this->userName . ')';
        $name = 'michaelbarrows.com';

        return $this->view('emails.contact.send_to_me')
            ->from($address, $name)
            ->replyTo($this->emailAddress, $this->userName)
            ->subject($subject)
            ->with([
                'name' => $this->userName,
                'email_address' => $this->emailAddress,
                'phone_number' => $this->phoneNumber,
                'user_message' => $this->userMessage,
            ]);
    }
}
