<?php

namespace App\Actions\Contact;

use App\Models\Contact;

class CreateContactAction
{
    public function execute(array $args): Contact
    {
        $contact = new Contact;

        $contact->fill($args);

        $contact->save();

        return $contact;
    }
}
