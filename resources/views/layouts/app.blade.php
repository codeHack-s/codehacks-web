<!DOCTYPE html>
@php
    $bgColorClass = Auth::user()->subscription_status === 'pro' ? 'bg-blue-50' : (Auth::user()->subscription_status === 'platinum' ? 'bg-orange-50' : 'bg-base-50');
    $theme = Auth::user()->subscription_status === 'pro' ? 'cupcake' : (Auth::user()->subscription_status === 'platinum' ? 'cupcake':'light');
    @endphp
<html data-theme="{{ $theme }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


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
            @section('sidebar')
                @include('layouts.sidebar')
            @show

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl text-gray-800 mx-auto py-2 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="p-2 sm:p-4 overflow-clip">
                {{ $slot }}
            </main>

        </div>
    </body>
</html>
