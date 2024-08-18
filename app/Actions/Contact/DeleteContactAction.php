<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use App\Repositories\ContactRepository;

class DeleteContactAction
{
    public function __construct(
        private ContactRepository $contactRepository,
    ) {
    }

    public function execute(Contact $contact): bool
    {
        return $this->contactRepository->deleteContact($contact);
    }
}
