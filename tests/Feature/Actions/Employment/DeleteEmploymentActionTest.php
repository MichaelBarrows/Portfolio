<?php

use App\Actions\Employment\DeleteEmploymentAction;
use App\Models\Employment;

it('deletes the model', function () {
    $employment = Employment::factory()->create();

    $result = (new DeleteEmploymentAction)->execute($employment);

    expect($result)->toBe(true);
    expect(Employment::count())->toBe(0);
});
