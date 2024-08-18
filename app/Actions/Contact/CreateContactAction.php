<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use App\Repositories\ContactRepository;

class CreateContactAction
{
    public function __construct(
        private ContactRepository $contactRepository,
    ) {
    }

    public function execute(array $args): Contact
    {
        $contact = $this->contactRepository->createContact($args);

        // @TODO send notification

        return $contact;
    }
}
