<?php

use App\Models\Education;
use App\Traits\Livewire\ModelEventsTrait;
use Illuminate\Support\Collection;

beforeEach(function () {
    $this->class = new class () {
        use ModelEventsTrait;

        public Collection $data;

        public function __construct()
        {
            $this->refreshModelFields = ['description'];
            $this->getData();
        }

        public function getData()
        {
            $this->data = Education::all()->keyBy('id');
        }
    };
});

test('modelCreated calls the getData method', function () {
    $this->class->getData();
    expect($this->class->data)->isEmpty()->toBeTrue();
    Education::factory(2)->create();

    $this->class->modelCreated([]);

    expect($this->class->data)->count()->toBe(2);
});

test('modelUpdated applies the updates to the models', function () {
    $education = Education::factory()->create();
    $this->class->getData();
    expect($this->class->data)->count()->toBe(1);

    $this->class->modelUpdated($education['id'], ['course_name' => 'test 2']);

    expect($this->class->data->first())->course_name->toBe('test 2');
});

test('modelUpdated reloads the whole model when the description key is provided', function () {
    $education = Education::factory()->create();
    $this->class->getData();
    expect($this->class->data)->count()->toBe(1);
    $education->update([
        'course_name' => 'test course',
    ]);

    $this->class->modelUpdated($education['id'], ['description' => 'some description', 'course_name' => 'test 2']);

    expect($this->class->data->first())->course_name->toBe('test course');
});

test('modelUpdated reloads the whole model when the filtered key is provided', function () {
    $education = Education::factory()->create();
    $this->class->getData();
    expect($this->class->data)->count()->toBe(1);
    $education->update([
        'course_name' => 'test course',
    ]);

    $this->class->modelUpdated($education['id'], ['filtered' => true]);

    expect($this->class->data->first())->course_name->toBe('test course');
});

test('modelDeleted removes the model from the dataset', function () {
    $education = Education::factory()->create();
    $this->class->getData();
    expect($this->class->data)->count()->toBe(1);

    $this->class->modelDeleted($education->getKey(), []);

    expect($this->class->data)->isEmpty()->toBeTrue();
});
