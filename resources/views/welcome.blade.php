<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tailwind CSS -->
    <title>codeHacks™️</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta property="og:title" content="codeHacks™️">
    <meta property="og:description" content="
    CodeHacks is a community of developers and tech enthusiasts learning to code, improving their skills, and building software projects.
    ">
    <meta property="og:image" content="{{asset('images/logo.png')}}">
    <meta property="og:url" content="https://codehacks.co.ke/">

    <meta name="twitter:card" content="{{asset('images/logo.png')}}">
    <meta name="twitter:site" content="@code_hacks254">
    <meta name="twitter:title" content="codeHacks™️">
    <meta name="twitter:description" content="
    CodeHacks is a community of developers and tech enthusiasts learning to code, improving their skills, and building software projects."/>
    <meta name="twitter:image" content="{{asset('storage/images/logo.png')}}">

    <link rel="icon" href="{{ asset('storage/images/fav.png') }}" type="image/png" sizes="16x16">
    <meta aria-description="
    CodeHacks is a community of developers and tech enthusiasts learning to code, improving their skills, and building software projects.
    ">

    <!--details for search engines-->
    <meta name="description" content="CodeHacks is a community of developers and tech enthusiasts learning to code, improving their skills, and building software projects.">

    <meta name="keywords" content="codeHacks, codehacks kenya, coding, learn coding, learn to code, programming, web development, web design, software development, Laravel, freelance, freelancing, tech community, coding community, programming community, Kenya, technology, JavaScript, Java, PHP, C++, C#, Python, Adobe, VS Code, UI, backend, SSH, VPS, Linux servers, Apache, Windows installation, codehacks.co.ke" />

    <script src="https://kit.fontawesome.com/af6aba113a.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .swiper-slide {
            height: 80.7vh; /* 2/3 of viewport height */
        }
        .swiper-slide img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .swiper-slide {
            background: url('{{ asset('storage/images/codehacks.svg ') }}');
            background-size: cover;
            background-position: center;

        }
    </style>
</head>

<body class="bg-gray-100">

<div class="navbar sticky top-0 z-50 bg-base-100 px-2 sm:px-6">
    <div class="navbar-start">
        <div class="dropdown">
            <a href="{{ route('about') }}" tabindex="0" class="btn btn-ghost btn-circle">
                <i class="fa-solid fa-2x fa-circle-info"></i>
            </a>
        </div>
        <a href="https://www.chuka.ac.ke/">
            <img src="{{ asset('images/chuka.png') }}" alt="Chuka University" class="w-8 h-8">
        </a>
    </div>
    <div class="navbar-center">
        <a href="{{ route('dashboard') }}" >
            <img src="{{ asset('storage/images/codew.png') }}" alt="Codehacks" class="w-28 sm:w-32 mix-blend-screen">
        </a>
    </div>

    <div class="navbar-end">

        <a href="https://github.com/codeHack-s" target="_blank" class="btn btn-ghost btn-circle">
            <i class="fa-brands fa-2x fa-github"></i>
        </a>

        <button class="btn fa-2x btn-ghost btn-circle">
            <i class="fa-brands fa-2x fa-whatsapp"></i>
        </button>

    </div>
</div>
<section class=overflow-x-hidden">

    <div class="swiper-slide w-full">
        {{--<img height="screen" src="/images/dark2.jpg" class="w-full min-h-64 object-cover" alt="image description">--}}
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
            <h1 class="text-1xl sm:text-2xl font-semibold text-white">Welcome to CodeHacks™️</h1>
            <p class="text-white mt-2">Waitlist V 0.0.1</p>
            <div class="space-x-4 flex items-center justify-center mt-4">
                <!-- Register and login buttons with icons -->
                <a href="{{ route('register') }}" class="">
                    <button class="btn normal-case w-[120px] btn-warning backdrop-blur-md ring-offset-2 rounded-full btn-outline ring-2">
                        <i class="fas fa-user-plus mr-1"></i>
                        Register
                    </button>
                </a>
                <a href="{{ route('login') }}" class="btn w-[120px] normal-case backdrop-blur-md btn-success rounded-full btn-outline ring-2 ring-offset-2 text-base-100">
                    <i class="fas fa-sign-in-alt mr-1"></i>
                    Login
                </a>
            </div>
        </div>
    </div>
    <div class="p-2 sm:p-6">
        <section class="info mt-2 text-gray-800 sm:my-4 py-8 bg-white shadow-sm flex flex-col gap-2 sm:gap-5 rounded-lg">

            <div class="sm:px-6 flex flex-col gap-2 justify-center items-center px-2">
                <div>
                    <i class="fa-solid fa-4x fa-meteor"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mb-6 text-gray-600">
                        Welcome to CodeHacks™️
                    </h2>
                    <p class="text-lg leading-6">
                        At CodeHacks, we're creating a vibrant community of tech enthusiasts, budding developers, and seasoned professionals. Here, you can dive into the world of coding, enhance your existing skills, and work collaboratively on innovative software projects.
                    </p>
                </div>
            </div>

            <!-- Chuka University logo -->
            <div class="flex justify-center my-6">
                <img src="{{ asset('images/chuka.png') }}" alt="Chuka University" class="w-24 h-24">
            </div>

            <div class="sm:px-6 px-2">
                <div class="sm:px-6 flex flex-col gap-2 justify-center items-center px-2">
                    <div>
                        <i class="fa-regular fa-4x fa-handshake"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-600">In Partnership with Chuka University</h3>
                        <p class="text-lg leading-6 mb-6">Our strategic partnership with Chuka University enables us to provide top-notch, industry-standard tech education. We combine our tech-savvy approach with Chuka University's academic excellence to bring you the best learning experience in the tech world.</p>
                    </div>
                </div>
                <div class="sm:px-6 flex flex-col gap-2 justify-center items-center px-2">
                    <div>
                        <i class="fa-solid fa-4x fa-rocket"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl my-4 text-gray-600">
                            We're Building Something Awesome</h3>
                        <p class="text-lg leading-6 mb-6">We're currently hard at work constructing our website to give you a seamless learning and community experience. It's going to be worth the wait!</p>
                    </div>
                </div>
            </div>

            <div class="sm:px-6 px-2 mt-6">
                <div class="sm:px-6 flex flex-col gap-2 justify-center items-center px-2">
                    <div>
                        <i class="fa-solid fa-4x fa-shield-halved"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl mb-4 text-gray-600">We're Now Live</h3>
                        <p class="text-lg leading-6 mb-6">
                            We're now live! You can now register a new account or login to your account. We'll be rolling out new features and updates regularly, so stay tuned!
                            <br>
                            For those members who registered before the launch, you can now log in to your account and access the platform.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>
<!-- Swiper JS -->

<!-- Scripts -->
</body>
</html>
