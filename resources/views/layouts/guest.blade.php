<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tailwind CSS -->
    <title>CodeHacks™️</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta property="og:title" content="codeHacks™️">
    <meta property="og:description" content="Codehacks is a KenTom company that offers a wide range of software services online including courses">
    <meta property="og:image" content="{{asset('storage/codehacks.png')}}">
    <meta property="og:url" content="https://codehacks.co.ke/">

    <meta name="twitter:card" content="{{asset('storage/logo.png')}}">
    <meta name="twitter:site" content="@code_hacks254">
    <meta name="twitter:title" content="codeHacks™️">
    <meta name="twitter:description" content="Codehacks is a KenTom company that offers a wide range of software services online including courses"/>
    <meta name="twitter:image" content="{{asset('logo.png')}}">

    <link rel="icon" href="{{ asset('storage/codehacks.png') }}" type="image/png" sizes="16x16">
    <meta aria-description="Codehacks is a KenTom company that offers a wide range of software services online including courses
    ">

    <!--details for search engines-->
    <meta name="description"
          content="CodeHacks is a community of developers and tech enthusiasts learning to code, improving their skills, and building software projects.">

    <meta name="keywords"
          content="codeHacks, codehacks kenya, coding, learn coding, learn to code, programming, web development, web design, software development, Laravel, freelance, freelancing, tech community, coding community, programming community, Kenya, technology, JavaScript, Java, PHP, C++, C#, Python, Adobe, VS Code, UI, backend, SSH, VPS, Linux servers, Apache, Windows installation, codehacks.co.ke"/>

    <script src="https://kit.fontawesome.com/af6aba113a.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-sm overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
