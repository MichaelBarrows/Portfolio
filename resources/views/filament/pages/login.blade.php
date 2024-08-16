<x-filament-panels::page.simple>
    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

    @if (config('auth.enable_password_login'))
        <x-filament-panels::form id="form" wire:submit="authenticate">
            {{ $this->form }}

            <x-filament-panels::form.actions
                :actions="$this->getCachedFormActions()"
                :full-width="$this->hasFullWidthFormActions()"
            />
        </x-filament-panels::form>
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}

    @if (config('auth.enable_password_login') && config('services.laravelpassport.enabled'))
        <hr />
    @endif


    @if(config('services.laravelpassport.enabled'))
        <x-filament::button
            :href="route('oauth.knox.redirect')"
            tag="a"
            color="knox"
            icon="knox"
        >
            Login with Knox
        </x-filament::button>
    @endif
</x-filament-panels::page.simple>
