<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Michael Barrows | Software Engineer in Colchester, England</title>

        @filamentStyles
        @vite('resources/css/filament/admin/theme.css')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        @livewire('landing')
        @livewire('about')
        @livewire('experience')
        @livewire('projects')
        @livewire('contact')
        @livewire('footer')

        {{-- modalwidth comment for tailwind purge, used widths: sm:max-w-sm sm:max-w-md sm:max-w-lg sm:max-w-xl sm:max-w-2xl sm:max-w-3xl sm:max-w-4xl sm:max-w-5xl sm:max-w-6xl sm:max-w-7xl sm:w-full sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w5xl text-md --}}
        @livewire('wire-elements-modal')
        @livewire('notifications')

        @filamentScripts
        <script src="https://kit.fontawesome.com/4d49df2bcb.js" crossorigin="anonymous"></script>
    </body>
</html>
