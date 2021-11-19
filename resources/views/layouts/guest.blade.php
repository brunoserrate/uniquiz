<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Uniquiz') }}</title>
    <link rel="icon" href="img/logo_icon.png" sizes="16x16 32x32" type="image/png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class="bg-uni_primary h-screen">
    <div>
        {{ $slot }}
        <div class="w-full flex flex-col mt-8">
            <livewire:uniquizrepo />
        </div>
    </div>

    @livewireScripts
</body>

</html>