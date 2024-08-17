<?php

use App\Livewire\About;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(About::class)
        ->assertStatus(200)
        ->assertViewHas('backEndSkills', fn ($skills) => is_array($skills) && ! empty($skills))
        ->assertViewHas('frontEndSkills', fn ($skills) => is_array($skills) && ! empty($skills))
        ->assertViewHas('otherSkills', fn ($skills) => is_array($skills) && ! empty($skills));
});
