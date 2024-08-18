<?php

use App\Actions\Contact\DeleteContactAction;
use App\Models\Contact;
use App\Repositories\ContactRepository;

it('deletes the model', function () {
    $contact = Contact::factory()->create();
    $action = new DeleteContactAction(
        new ContactRepository
    );

    $result = $action->execute($contact);

    expect($result)->toBe(true);
    expect(Contact::count())->toBe(0);
});
