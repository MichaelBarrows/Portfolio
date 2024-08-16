<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as AuthLogin;
use Illuminate\Contracts\Support\Htmlable;

class Login extends AuthLogin
{
    protected static string $view = 'filament.pages.login';

    public function authenticate():? LoginResponse
    {
        $userHasPassword = User::query()
            ->where('email', $this->getCredentialsFromFormData($this->form->getState())['email'])
            ->whereNotNull('password')
            ->exists();
        if (! $userHasPassword) {
            $this->throwFailureValidationException();
        }

        return parent::authenticate();
    }

    public function getHeading(): string|Htmlable
    {
        return '';
    }
}
