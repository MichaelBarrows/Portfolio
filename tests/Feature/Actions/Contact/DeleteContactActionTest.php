<?php

use App\Actions\Contact\DeleteContactAction;
use App\Models\Contact;

it('deletes the model', function () {
    $contact = Contact::factory()->create();

    $result = (new DeleteContactAction)->execute($contact);

    expect($result)->toBe(true);
    expect(Contact::count())->toBe(0);
});
