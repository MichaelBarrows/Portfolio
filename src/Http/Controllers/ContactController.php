<?php

namespace MichaelBarrows\Portfolio\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use MichaelBarrows\Portfolio\Http\Requests\ContactFormValidationRequest;
use MichaelBarrows\Portfolio\Models\Contact;

class ContactController extends Controller
{
    public function __invoke(ContactFormValidationRequest $request): JsonResponse
    {
        $contact = Contact::create($request->all());

        return response()->json([
            'success' => (bool) $contact,
        ], Response::HTTP_CREATED);
    }
}
