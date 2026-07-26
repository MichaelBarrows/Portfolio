<x-filament-panels::page.simple>
    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

    @if (config('auth.enable_password_login'))
        <form id="form" wire:submit="authenticate" class="grid gap-y-6">
            {{ $this->form }}

            <x-filament::button type="submit" class="w-full">
                {{ __('filament-panels::auth/pages/login.form.actions.authenticate.label') }}
            </x-filament::button>
        </form>
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}

    @if (config('auth.enable_password_login') && config('services.laravelpassport.enabled'))
        <hr />
    @endif


    @if(config('services.google.enabled'))
        <x-filament::button
            :href="route('oauth.google.redirect')"
            tag="a"
            color="primary"
            icon="google"
        >
            Login with Google
        </x-filament::button>
    @endif
</x-filament-panels::page.simple>
