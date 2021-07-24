<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
Use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSendMe;
use App\Mail\ContactSendThem;
use App\Models\SiteSetting;
use App\Http\Requests\ContactFormValidationRequest;

class ContactController extends Controller
{
    public function store(ContactFormValidationRequest $request)
    {
        if ($contactMessage = Contact::create($request->all())) {
            $request->session()->flash('success', 'Message sent!');
        } else {
            $request->session()->flash('error', 'Message not sent!');
        }

        $data = [
            'name' => $request->name,
            'email_address' => $request->email_address,
            'phone_number' => $request->phone_number,
            'user_message' => $request->message,
        ];
        $emailsAllowed = SiteSetting::findOrFail(SiteSetting::EMAILS_ALLOWED);
        if ($emailsAllowed->value) {
            Mail::to($request->input('email_address'))->send(new ContactSendThem($data));
            Mail::to('contact@michaelbarrows.com')->send(new ContactSendMe($data));
        }
        return redirect('/#contact');
    }
}
