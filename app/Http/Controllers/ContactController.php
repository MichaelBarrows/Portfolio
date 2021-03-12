<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSendMe;
use App\Mail\ContactSendThem;
use App\Models\SiteSetting;
use App\Http\Requests\ContactFormValidationRequest;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormValidationRequest $request)
    {
        $validated = $request->validated();

        if ($contact_message = Contact::create($request->all())) {
            $request->session()->flash('success', 'Message sent!');
        } else {
            $request->session()->flash('error', 'Message not sent!');
        }

        $data = ['name' => $request->input('name'),
                 'email_address' => $request->input('email_address'),
                 'phone_number' => $request->input('phone_number'),
                 'user_message' => $request->input('message')];
        $emails_allowed = SiteSetting::findOrFail(2);
        if ($emails_allowed == true) {
            Mail::to($request->input('email_address'))->send(new ContactSendThem($data));
            Mail::to('contact@michaelbarrows.com')->send(new ContactSendMe($data));
        }
        return redirect('/#contact');
    }
}
