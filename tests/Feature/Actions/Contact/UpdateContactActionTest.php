<?php

use App\Actions\Contact\UpdateContactAction;
use App\Models\Contact;

it('updates the model', function () {
    $model = Contact::factory()->create([
        'name' => 'Test Name',
        'email' => 'test.user@example.com',
        'phone' => '01234567890',
        'message' => 'test message',
    ]);

    $result = (new UpdateContactAction)->execute(
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
