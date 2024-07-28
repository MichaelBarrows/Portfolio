<?php

namespace App\Actions\Contact;

use App\Models\Contact;

class DeleteContactAction
{
    public function execute(Contact $contact): bool
    {
        return $contact->delete();
    }
}
