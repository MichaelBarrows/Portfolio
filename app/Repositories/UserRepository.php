<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class UserRepository
{
    public function createUser(array $args = []): ?User
    {
        $record = new User;

        $record->fill($args);

        $record->save();

        return $record;
    }

    public function updateUser(User $model, array $args = []): User
    {
        $model->fill($args);

        $model->save();

        return $model;
    }

    public function deleteUser(User $model): bool
    {
        return $model->delete();
    }

    public function createUserFromSocialiteUser(SocialiteUser $socialiteUser)
    {
        return User::firstOrCreate([
            'email' => $socialiteUser->getEmail(),
            'name' => $socialiteUser->getName(),
        ]);
    }
}
