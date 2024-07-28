<?php

use App\Actions\Education\DeleteEducationAction;
use App\Models\Education;

it('deletes the model', function () {
    $education = Education::factory()->create();

    $result = (new DeleteEducationAction)->execute($education);

    expect($result)->toBe(true);
    expect(Education::count())->toBe(0);
});
