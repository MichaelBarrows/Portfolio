<?php

use App\Models\OauthMethod;
use App\Models\User;
use App\Repositories\OauthMethodRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use Laravel\Socialite\Two\User as SocialiteUser;

test('createOauthMethod creates the model', function () {
    $args = OauthMethod::factory()->definition();
    $user = User::factory()->create();
    $repository = new OauthMethodRepository;

    $result = $repository->createOauthMethod(
        user: $user,
        args: $args,
    );

    expect($result)->toBeInstanceOf(OauthMethod::class);
    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

test('updateOauthMethod updates the model', function () {
    $args = OauthMethod::factory()
        ->definition();
    $model = OauthMethod::factory()
        ->withUser()
        ->create();
    $repository = new OauthMethodRepository;

    $result = $repository->updateOauthMethod(
        model: $model,
        args: $args,
    );

    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

test('deleteOauthMethod deletes the model', function () {
    $model = OauthMethod::factory()
        ->withUser()
        ->create();
    $repository = new OauthMethodRepository;

    $result = $repository->deleteOauthMethod($model);

    expect($result)->toBe(true);
    expect(OauthMethod::count())->toBe(0);
});

test('getMethodForSocialiteUser returns an oauth method for a socialite user', function () {
    $user = User::factory()->create();
    $oauthMethod = OauthMethod::factory()
        ->for($user)
        ->create();

    $mockUser = Mockery::mock(SocialiteUser::class);
    $mockUser->shouldReceive('getId')
        ->andReturn($oauthMethod->provider_id);

    $repository = new OauthMethodRepository;

    $result = $repository->getMethodForSocialiteUser(
        provider: $oauthMethod->provider,
        socialiteUser: $mockUser,
    );

    expect($result)->toBeInstanceOf(OauthMethod::class);
    expect($result)->getKey()->toBe($oauthMethod->getKey())
        ->user->getKey()->toBe($user->getKey());
});

test('getMethodForSocialiteUser returns null when the oauth method doesnt exist', function () {
    $mockUser = Mockery::mock(SocialiteUser::class);
    $mockUser->shouldReceive('getId')
        ->andReturn(fake()->uuid());

    $repository = new OauthMethodRepository;

    $result = $repository->getMethodForSocialiteUser(
        provider: 'knox',
        socialiteUser: $mockUser,
    );

    expect($result)->toBeNull();
});

test('createMethodForUser creates the oauth method and associates it with the user', function () {
    $user = User::factory()->create();

    $mockUser = Mockery::mock(SocialiteUser::class);
    $mockUser->shouldReceive('getId')
        ->andSet('refreshToken', $refreshToken = fake()->uuid())
        ->andReturn($providerId = fake()->uuid());

    $repository = new OauthMethodRepository;

    $result = $repository->createMethodForUser(
        provider: 'knox',
        user: $user,
        socialiteUser: $mockUser,
    );

    expect($result)->toBeInstanceOf(OauthMethod::class);
    expect($result)->provider->toBe('knox')
        ->provider_id->toBe($providerId)
        ->user->getKey()->toBe($user->getKey());
    expect(Crypt::decrypt($result->refresh_token))->toBe($refreshToken);
});

test('createMethodForUser returns the existing oauth method when it is associated to the user', function () {
    $user = User::factory()->create();
    $oauthMethod = OauthMethod::factory()
        ->for($user)
        ->create();

    $mockUser = Mockery::mock(SocialiteUser::class);
    $mockUser->shouldReceive('getId')
        ->andSet('refreshToken', $oauthMethod->refresh_roken)
        ->andReturn($oauthMethod->provider_id);

    $repository = new OauthMethodRepository;

    $result = $repository->createMethodForUser(
        provider: $oauthMethod->provider,
        user: $user,
        socialiteUser: $mockUser,
    );

    expect($result)->toBeInstanceOf(OauthMethod::class);
    expect($result)->getKey()->toBe($oauthMethod->getKey())
        ->user->getKey()->toBe($user->getKey());

    $this->assertDatabaseCount(
        table: User::class,
        count: 1,
    );
    $this->assertDatabaseCount(
        table: OauthMethod::class,
        count: 1,
    );
});

test('createMethodForUser throws an exception when the provider is already associated to a different user', function () {
    $user = User::factory()->create();
    $oauthMethod = OauthMethod::factory()
        ->for($user)
        ->create();
    $newUser = User::factory()->create();

    $mockUser = Mockery::mock(SocialiteUser::class);
    $mockUser->shouldReceive('getId')
        ->andSet('refreshToken', $oauthMethod->refresh_roken)
        ->andReturn($oauthMethod->provider_id);

    $repository = new OauthMethodRepository;

    $result = $repository->createMethodForUser(
        provider: $oauthMethod->provider,
        user: $newUser,
        socialiteUser: $mockUser,
    );
})
->throws(QueryException::class);
