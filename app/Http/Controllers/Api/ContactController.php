<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormValidationRequest;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function __invoke(ContactFormValidationRequest $request): JsonResponse
    {
        Contact::create($request->all());

        return response()->json();
    }
}
