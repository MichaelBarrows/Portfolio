<?php

namespace App\Actions\Contact;

use App\Models\Contact;

class UpdateContactAction
{
    public function execute(Contact $contact, array $args): Contact
    {
        $contact->fill($args);

        $contact->save();

        return $contact;
    }
}
