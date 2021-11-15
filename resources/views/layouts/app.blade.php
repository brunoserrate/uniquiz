<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/img_logo.png') }}" sizes="16x16 32x32" type="image/png">

    <title>{{ config('app.name', 'Uniquiz') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        :root{
            --p:228 48% 28%;
            --bc:228 48% 8%;
            --nf:228 48% 68%;
        }
    </style>
    @livewireStyles
</head>

<body>
    <div class="w-full h-screen flex flex-col">
        @include('layouts.navigation', ['params' => \Request::route()->getName()])

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>

</html>