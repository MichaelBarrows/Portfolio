<?php

use App\Models\User;
use App\Repositories\UserRepository;
use Laravel\Socialite\Two\User as SocialiteUser;

it('creates the model', function () {
    $args = User::factory()->definition();
    unset(
        $args['email_verified_at'],
        $args['remember_token'],
        $args['password'],
    );

    $repository = new UserRepository;

    $result = $repository->createUser($args);

    expect($result)->toBeInstanceOf(User::class);
    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

it('updates the model', function () {
    $args = User::factory()->definition();
    unset(
        $args['email_verified_at'],
        $args['remember_token'],
        $args['password'],
    );

    $model = User::factory()->create();
    $repository = new UserRepository;

    $result = $repository->updateUser(
        model: $model,
        args: $args,
    );

    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

it('deletes the model', function () {
    $model = User::factory()->create();
    $repository = new UserRepository;

    $result = $repository->deleteUser($model);

    expect($result)->toBe(true);
    expect(User::count())->toBe(0);
});

it('creates a user from the socialite user', function () {
    $mockUser = Mockery::mock(socialiteUser::class);
    $mockUser->shouldReceive('getEmail')
        ->andReturn($email = fake()->safeEmail());
    $mockUser->shouldReceive('getName')
        ->andReturn($name = fake()->name());

    $repository = new UserRepository;

    $result = $repository->createUserFromSocialiteUser($mockUser);

    expect($result)->toBeInstanceOf(User::class);
    expect($result)->name->toBe($name)
        ->email->toBe($email)
        ->password->toBeNull();

    $this->assertDatabaseCount(
        table: User::class,
        count: 1,
    );
});

it('returns the existing user', function () {
    $user = User::factory()->create(['password' => null]);
    $mockUser = Mockery::mock(socialiteUser::class);
    $mockUser->shouldReceive('getEmail')
        ->andReturn($user->email);
    $mockUser->shouldReceive('getName')
        ->andReturn($user->name);

    $repository = new UserRepository;

    $result = $repository->createUserFromSocialiteUser($mockUser);

    expect($result)->toBeInstanceOf(User::class);
    expect($result)->getKey()->toBe($user->getKey());

    $this->assertDatabaseCount(
        table: User::class,
        count: 1,
    );
});
