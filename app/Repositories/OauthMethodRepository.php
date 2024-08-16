<?php

namespace App\Repositories;

use App\Models\OauthMethod;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class OauthMethodRepository
{
    public function createOauthMethod(User $user, array $args = []): ?OauthMethod
    {
        $record = new OauthMethod;

        $record->user()->associate($user);

        $record->fill($args);

        $record->save();

        return $record;
    }

    public function updateOauthMethod(OauthMethod $model, ?User $user = null, array $args = []): OauthMethod
    {
        if ($user) {
            $model->user()->associate($user);
        }

        $model->fill($args);

        $model->save();

        return $model;
    }

    public function deleteOauthMethod(OauthMethod $model): bool
    {
        return $model->delete();
    }

    public function getMethodForSocialiteUser(string $provider, SocialiteUser $socialiteUser): ?OauthMethod
    {
        return OauthMethod::query()
            ->with('user')
            ->whereProvider($provider)
            ->whereProviderId($socialiteUser->getId())
            ->first();
    }

    public function createMethodForUser(string $provider, User $user, SocialiteUser $socialiteUser): ?OauthMethod
    {
        $existingProvider = $user->oauthMethods
            ->where('provider', $provider)
            ->where('provider_id', $socialiteUser->getId())
            ->first();

        if ($existingProvider) {
            if ($existingProvider->user->getKey() === $user->getKey()) {
                return $existingProvider;
            }
        }

        $method = new OauthMethod();

        $method->provider = $provider;
        $method->provider_id = $socialiteUser->getId();
        $method->refresh_token = Crypt::encrypt($socialiteUser->refreshToken);

        $method->user()->associate($user);

        $method->save();

        return $method;
    }
}
