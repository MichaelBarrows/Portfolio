<?php

namespace App\Filament\Pages;

use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use App\Models\User;
use Illuminate\Contracts\Support\Htmlable;

class Login extends \Filament\Auth\Pages\Login
{
    protected string $view = 'filament.pages.login';

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
