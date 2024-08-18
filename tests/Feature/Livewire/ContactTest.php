<?php

use App\Livewire\Contact as ContactComponent;
use App\Models\Contact as ContactModel;
use Filament\Notifications\Notification;

use function Pest\Livewire\livewire;

it('renders the form appropriately', function ($field) {
    livewire(ContactComponent::class)
        ->assertFormFieldExists($field)
        ->assertFormFieldIsEnabled($field)
        ->assertFormFieldIsVisible($field);
})->with([
    ['name'],
    ['email'],
    ['phone'],
    ['message'],
]);

it('validates the input', function ($field, $validInput) {
    livewire(ContactComponent::class)
        ->fillForm([$field => ''])
        ->call('save')
        ->assertHasFormErrors([$field => 'required'])
        ->fillForm([$field => $validInput])
        ->call('save')
        ->assertHasNoFormErrors([$field]);

    $this->assertDatabaseEmpty(ContactModel::class);
})->with([
    ['name', fake()->name()],
    ['email', fake()->safeEmail()],
    ['phone', fake()->numerify('###########')],
    ['message', fake()->words(10, true)],
]);

it('validates the input for minimum length', function ($field, $validInput) {
    livewire(ContactComponent::class)
        ->fillForm([$field => 'few'])
        ->call('save')
        ->assertHasFormErrors([$field => 'min'])
        ->fillForm([$field => $validInput])
        ->call('save')
        ->assertHasNoFormErrors([$field]);

    $this->assertDatabaseEmpty(ContactModel::class);
})->with([
    ['phone', fake()->numerify('###########')],
    ['message', fake()->words(10, true)],
]);

it('stores the input and notifies the user', function () {
    $data = [
        'name' =>fake()->name(),
        'email' => fake()->safeEmail(),
        'phone' => fake()->numerify('01#########'),
        'message' => fake()->words(15, true),
    ];

    livewire(ContactComponent::class)
        ->fillForm($data)
        ->call('save')
        ->assertHasNoFormErrors()
        ->assertNotified(
            Notification::make()
                ->title('Success')
                ->body('The contact form has been submitted successfully')
                ->success()
        );

    $this->assertDatabaseHas(
        table: ContactModel::class,
        data: $data,
    );
});
