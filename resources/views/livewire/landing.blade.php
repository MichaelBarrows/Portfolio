<div class="md:min-h-[100vh] md:flex md:items-center md:place-content-center">
    <div>
        <h1 class="max-w-[95%] md:max-w-6xl text-center text-4xl md:text-6xl font-semibold mt-16 md:mt-8 mb-16 2xl:mb-24 mx-auto text-pacific-blue-600">Hi, I'm Michael, a Software Engineer in Colchester, Essex!</h1>
        <div class="max-w-[95%] md:max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-5 pb-10 md:pb-16 lg:pb-24 2xl:pb-32">
            <div class="@if($settings['show-currently-playing']) lg:col-span-5 @else lg:col-span-8 @endif md:pb-2">
                <p class="text-center text-xl text-pacific-blue-600 pb-2 font-semibold">Working with</p>
                <div class="bg-gray-100 rounded-md shadow-md p-2 pt-4">
                    <div class="grid grid grid-cols-3 bg-gray-100 rounded-md gap-5">
                        <div class="text-center">
                            <a href="https://www.php.net/" target="_blank" title="PHP">
                                <i class="fab fa-php text-3xl rounded-full aspect-square p-2 pt-3 m-2 bg-[#777BB3] text-white "></i>
                            </a>
                            <p class="text-[#777BB3] text-lg pt-0 font-semibold">PHP</p>
                        </div>

                        <div class="text-center">
                            <a href="https://laravel.com" target="_blank" title="Laravel">
                                <i class="fab fa-laravel text-3xl rounded-full aspect-square p-3 m-2 bg-[#F05340] text-white"></i>
                            </a>
                            <p class="text-[#F05340] text-lg pt-0 font-semibold">Laravel</p>
                        </div>

                        <div class="text-center">
                            <a href="https://livewire.laravel.com" target="_blank" title="Livewire">
                                <img class="w-[60px] mx-auto pb-3" src="https://avatars.githubusercontent.com/u/51960834?s=100&v=4" alt="Livewire logo">
                            </a>
                            <p class="text-[#EE5D99] text-lg pt-0 font-semibold">Livewire</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="@if($settings['show-currently-playing']) lg:col-span-3 @else lg:col-span-4 @endif md:pb-2">
                <p class="text-center text-xl text-pacific-blue-600 pb-2 font-semibold">Working at</p>
                <div class="text-center bg-gray-100 rounded-md shadow-md p-2 pt-4">
                    <a href="{{ $settings['currently-working-at']['url'] }}" target="_blank" title="{{ $settings['currently-working-at']['text'] }}">
                        @if(empty($settings['currently-working-at']['image']))
                            <i class="fas fa-building text-3xl rounded-full aspect-square px-4 py-3 mt-3 mb-2 text-white" style="background-color: {{ $settings['currently-working-at']['primary-color'] }}; color: {{ $settings['currently-working-at']['secondary-color'] }} "></i>
                        @else
                            <img class="mx-auto rounded-full aspect-square max-w-[73px]" src="{{ $settings['currently-working-at']['image'] }}" />
                        @endif
                    </a>
                    <p class="text-lg pt-0 font-semibold" style="color: {{ $settings['currently-working-at']['primary-color'] }}">{{ $settings['currently-working-at']['text'] }}</p>
                </div>
            </div>

            @if ($settings['show-currently-playing'])
                <div class="lg:col-span-4 md:pb-2">
                    <p class="text-center text-xl text-pacific-blue-600 pb-2 font-semibold">Listening to</p>
                    <div class="bg-gray-100 rounded-md shadow-md">
                        @livewire('currently-playing')
                    </div>
                </div>
            @endif

            <div class="lg:col-span-6 md:pb-2">
                <p class="text-center text-xl text-pacific-blue-600 pb-2 font-semibold">Playing with</p>
                <div class="bg-gray-100 rounded-md shadow-md p-2 pt-4">
                    <div class="grid grid-cols-3 md:grid-cols-5 bg-gray-100 rounded-md gap-5">
                        <div class="text-center">
                            <a href="https://nativephp.com" target="_blank" title="NativePHP">
                                <img class="max-w-[60px] mx-auto pb-3" src="https://avatars.githubusercontent.com/u/130286900?s=100&v=4" alt="NativePHP logo">
                            </a>
                            <p class="text-[#111827] text-lg pt-0 font-semibold">NativePHP</p>
                        </div>

                        <div class="text-center">
                            <a href="https://livewire.laravel.com" target="_blank" title="Livewire">
                                <img class="w-[60px] mx-auto pb-3" src="https://avatars.githubusercontent.com/u/51960834?s=100&v=4" alt="Livewire logo">
                            </a>
                            <p class="text-[#EE5D99] text-lg pt-0 font-semibold">Livewire</p>
                        </div>

                        <div class="text-center">
                            <a href="https://filamentphp.com/" target="_blank" title="Filament">
                                <img class="w-[60px] mx-auto pb-3" src="https://avatars.githubusercontent.com/u/64450473?s=200&v=4" alt="Filament logo">
                            </a>
                            <p class="text-[#FDAE4B] text-lg pt-0 font-semibold">Filament</p>
                        </div>

                        <div class="text-center">
                            <a href="https://vuejs.org/" target="_blank" title="Vue">
                                <img class="w-[60px] mx-auto pb-3" src="https://avatars.githubusercontent.com/u/6128107?s=200&v=4" alt="Vue logo">
                            </a>
                            <p class="text-[#41b883] text-lg pt-0 font-semibold">Vue</p>
                        </div>

                        <div class="text-center">
                            <a href="https://developer.spotify.com/" target="_blank" title="Spotify API">
                                <i class="fab fa-spotify text-3xl rounded-full aspect-square p-3 m-2 bg-[#1DB954] text-white"></i>
                            </a>
                            <p class="text-[#1DB954] text-lg pt-0 font-semibold">Spotify <span class="lg:hidden xl:inline-block">API</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 md:pb-2">
                <p class="text-center text-xl text-pacific-blue-600 pb-2 font-semibold">Other Links</p>
                <div class="bg-gray-100 rounded-md shadow-md p-2 pt-4">
                    <div class="grid grid-cols-2 bg-gray-100 rounded-md gap-5">
                        <div class="text-center">
                            <a href="https://github.com/MichaelBarrows/" target="_blank" title="GitHub/MichaelBarrows">
                                <i class="fab fa-github text-3xl rounded-full aspect-square p-3 m-2 bg-[#171515] text-white"></i>
                            </a>
                            <p class="text-[#171515] text-lg pt-0 font-semibold">GitHub</p>
                        </div>

                        <div class="text-center">
                            <a href="https://www.linkedin.com/in/michaelpbarrows/" target="_blank" title="LinkedIn/MichaelPBarrows">
                                <i class="fab fa-linkedin text-3xl rounded-full aspect-square p-3 m-2 bg-[#0077b5] text-white"></i>
                            </a>
                            <p class="text-[#0077b5] text-lg pt-0 font-semibold">LinkedIn</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 md:pb-2">
                <p class="text-center text-xl text-pacific-blue-600 pb-2 font-semibold">Exploring opportunities</p>
                @if ($settings['open-to-opportunities'])
                    <div class="text-center bg-gray-100 rounded-md shadow-md p-2 pt-4">
                        <i class="fas fa-check text-3xl aspect-square rounded-full px-3 pt-3 m-2 bg-gradient-to-br from-emerald-400 to-emerald-800 text-white"></i>
                        <p class="text-emerald-500 text-lg pt-0 font-semibold">Yes, get in touch</p>
                    </div>
                @else
                    <div class="text-center bg-gray-100 rounded-md shadow-md p-2 pt-4">
                        <i class="fas fa-times-circle text-3xl aspect-square rounded-full p-3 py-3 m-2 bg-gradient-to-br from-red-400 to-red-800 text-white"></i>
                        <p class="text-red-500 text-lg pt-0 font-semibold">Not at the moment</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('echo:settings,Settings\\SettingUpdated', function (event) {
            if (event[0].key === 'show-currently-playing' && event[0].value === false) {
                setTimeout(() => Echo.leave('currently-playing'), 2000);
            }
        });
</script>
@endscript
