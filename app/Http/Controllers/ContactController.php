<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormValidationRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function store(ContactFormValidationRequest $request): RedirectResponse
    {
        if (Contact::create($request->all())) {
            $request->session()->flash('success', 'Message sent!');
        } else {
            $request->session()->flash('error', 'Message not sent!');
        }

        return redirect('/#contact');
    }
}
