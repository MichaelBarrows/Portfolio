<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function createContact(array $args = []): ?Contact
    {
        $record = new Contact;

        $record->fill($args);

        $record->save();

        return $record;
    }

    public function updateContact(Contact $model, array $args = []): Contact
    {
        $model->fill($args);

        $model->save();

        return $model;
    }

    public function deleteContact(Contact $model): bool
    {
        return $model->delete();
    }
}
