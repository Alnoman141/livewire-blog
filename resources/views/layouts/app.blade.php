<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Css -->
        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        <link rel="stylesheet" href="{{ asset('css/backend/styles.css')}}">
        <link rel="stylesheet" href="{{ asset('css/backend/all.css')}}">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

    </head>
    <body class="mx-auto bg-grey-400mx-auto bg-grey-400">
        <div class="min-h-screen bg-gray-100 flex flex-col">

            @include('livewire.backend.partials.header')
            <div class="flex flex-1">
                @include('livewire.backend.partials.sidebar')
                @yield('content')

            </div>

        </div>

        <!-- Scripts -->
        @livewireScripts

        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
        <script src="{{ asset('js/backend/main.js')}}"></script>
    </body>
</html>
