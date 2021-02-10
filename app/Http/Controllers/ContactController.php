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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        if ($emails_allowed == True) {
            Mail::to($request->input('email_address'))->send(new ContactSendThem($data));
            Mail::to('contact@michaelbarrows.com')->send(new ContactSendMe($data));
        }
        return redirect('/#contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
