<?php

use App\Actions\Contact\UpdateContactAction;
use App\Models\Contact;
use App\Repositories\ContactRepository;

it('updates the model', function () {
    $model = Contact::factory()->create([
        'name' => 'Test Name',
        'email' => 'test.user@example.com',
        'phone' => '01234567890',
        'message' => 'test message',
    ]);
    $action = new UpdateContactAction(
        new ContactRepository
    );

    $result = $action->execute(
        contact: $model,
        args: [
            'name' => 'New Test Name',
            'email' => 'new.test.user@example.com',
            'phone' => '09999999999',
            'message' => 'new test message',
        ]);

    expect($result)
        ->name->toBe('New Test Name')
        ->email->toBe('new.test.user@example.com')
        ->phone->toBe('09999999999')
        ->message->toBe('new test message');
});
