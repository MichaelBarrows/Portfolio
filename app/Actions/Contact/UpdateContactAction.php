<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use App\Repositories\ContactRepository;

class UpdateContactAction
{
    public function __construct(
        private ContactRepository $contactRepository,
    ) {
    }

    public function execute(Contact $contact, array $args): Contact
    {
        $contact = $this->contactRepository->updateContact(
            model: $contact,
            args: $args,
        );

        return $contact;
    }
}
