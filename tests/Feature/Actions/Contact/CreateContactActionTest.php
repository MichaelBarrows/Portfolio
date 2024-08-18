<?php

use App\Actions\Contact\CreateContactAction;
use App\Models\Contact;
use App\Repositories\ContactRepository;

beforeEach(function () {
    $this->data = [
        'name' => $this->faker->name,
        'email' => $this->faker->email,
        'phone' => $this->faker->numerify('0###########'),
        'message' => $this->faker->words(15, true),
    ];

    $this->action = new CreateContactAction(
        new ContactRepository
    );
});

it('returns the created model', function () {
    $result = $this->action->execute($this->data);

    expect($result)->toBeInstanceOf(Contact::class);
    expect($result)
        ->name->toBe($this->data['name'])
        ->email->toBe($this->data['email'])
        ->phone->toBe($this->data['phone'])
        ->message->toBe($this->data['message']);
});

it('stores the data', function () {
    $this->action->execute($this->data);

    $this->assertDatabaseHas(
        table: Contact::class,
        data: $this->data,
    );
});
