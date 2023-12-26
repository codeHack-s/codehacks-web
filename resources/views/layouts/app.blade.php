<!DOCTYPE html>

<html data-theme="{{ session('theme', 'light') }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/af6aba113a.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- LiveWire Styles -->
        @livewireStyles

        <!-- Livewire Scripts -->
        @livewireScripts

    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen">

            @include('layouts.navigation')
            <!-- || -->

            <section class="flex">

                @section('sidebar')
                    @include('layouts.sidebar')
                @show

                <!-- Page Content -->
                <main class="p-2 sm:p-4 w-full mt-14 overflow-clip">
                    {{ $slot }}
                </main>

            </section>

        </div>
    </body>
</html>
