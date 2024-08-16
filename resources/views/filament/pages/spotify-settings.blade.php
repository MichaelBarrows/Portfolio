<x-filament-panels::page>

@assets
@vite('resources/js/app.js')
@endassets

<div class="fi-wi-stats-overview-stats-ctn grid gap-6 md:grid-cols-2">
    <div class="fi-wi-stats-overview-stat relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <div class="grid gap-y-2">
            <div class="flex items-center">
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    Connected User
                </span>
            </div>

            <div class="text-2xl font-semibold tracking-tight text-gray-950 dark:text-white grid md:grid-cols-3 items-center">
                <div class="flex items-center space-x-4 md:col-span-2 md:py-2">
                    <img class="rounded-full" src="{{ $userAvatar }}" />
                    <p class="@if(! empty($userName)) p-3 @endif">{{ $userName ?? 'No User Associated' }}</p>
                </div>
                <div class="flex flex-row-reverse">
                    <x-filament::button
                        href="/oauth/spotify/redirect"
                        tag="a"
                        :color="! empty($userName) ? 'danger' : 'success'"
                    >
                        @if(! empty($userName))
                            Switch User
                        @else
                            Sign in
                        @endif
                    </x-filament::button>
                </div>
            </div>
        </div>
    </div>

    <div class="fi-wi-stats-overview-stat relative rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <div class="grid gap-y-2">
            @livewire('currently-playing')
        </div>
    </div>

    <div class="col-span-2">
        @livewire('spotify-content-settings')
    </div>
</div>
</x-filament-panels::page>
