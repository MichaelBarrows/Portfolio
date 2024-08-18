<?php

use App\Models\Contact;
use App\Repositories\ContactRepository;

test('createContact creates the model', function () {
    $args = Contact::factory()->definition();
    $repository = new ContactRepository;

    $result = $repository->createContact($args);

    expect($result)->toBeInstanceOf(Contact::class);
    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

test('updateContact updates the model', function () {
    $args = Contact::factory()->definition();
    $model = Contact::factory()->create();
    $repository = new ContactRepository;

    $result = $repository->updateContact(
        model: $model,
        args: $args,
    );

    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

test('deleteContact deletes the model', function () {
    $model = Contact::factory()->create();
    $repository = new ContactRepository;

    $result = $repository->deleteContact($model);

    expect($result)->toBe(true);
    expect(Contact::count())->toBe(0);
});
