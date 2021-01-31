@if(isset($maintenance_mode))
@if($maintenance_mode->value == "true")
    @include('layouts.maintenance_mode')
@else
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>@yield('title')Michael Barrows</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html"/>
        <meta name="keywords" content="University, Module, Year, Grade, Calculator, Average, Percentage, Student, Degree, Classification"/>
        <meta name="description" content="An easy way to calculate your weighted module and year university grades with classifications."/>
        <meta name="author" content="Michael Barrows"/>
        @yield('canonical')
        <meta name="theme-color" content="#007684">


        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://kit.fontawesome.com/b78699b149.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    </head>
    <body>
        <div class="hex-bg-container">
            <header>
                <div class="grid-container grid">
                    <div class="desktop-5 mobile-12">
                        <h1><a href="{{ route('index') }}">Michael Barrows</a></h1>
                    </div>
                    <nav class="mobile mobile-12 desktop-hidden grid">
                    </nav>
                    <div class="desktop-7 mobile-hidden align-right">
                        <nav class="desktop align-right flex-container flex-right">
                        </nav>
                    </div>
                </div>
            </header>
            @yield('content')
        </div>
    </body>
    </html>
@endif
@endif
