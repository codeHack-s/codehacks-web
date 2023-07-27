<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tailwind CSS -->
    <title>Cashout</title>
    <script src="https://kit.fontawesome.com/af6aba113a.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="h-auto antialiased leading-none">

<main class="py-6 px-4 sm:p-6 md:py-10 md:px-8">
    <div class="max-w-4xl mx-auto grid grid-cols-1 lg:max-w-5xl lg:gap-x-20 lg:grid-cols-2">
        <div class="relative p-3 col-start-1 row-start-1 flex flex-col-reverse rounded-lg bg-gradient-to-t from-black/75 via-black/0 sm:bg-none sm:row-start-2 sm:p-0 lg:row-start-1">
            <h1 class="mt-1 text-lg font-semibold text-white sm:text-slate-900 md:text-2xl dark:sm:text-white">CodeHacks™️⚡</h1>
            <p class="text-sm leading-4 font-medium text-white sm:text-slate-500 dark:sm:text-slate-400">Do you want to level up your programming skills ? Join</p>
        </div>
        <div class="grid gap-4 col-start-1 col-end-3 row-start-1 sm:mb-6 sm:grid-cols-4 lg:gap-6 lg:col-start-2 lg:row-end-6 lg:row-span-6 lg:mb-0">
            <img src="{{ asset('storage/images/bg1.jpg') }}" alt="" class="w-full h-60 object-cover rounded-lg sm:h-52 sm:col-span-2 lg:col-span-full" loading="lazy">
            <img src="{{ asset('storage/images/bg2.jpg') }}" alt="" class="hidden w-full h-52 object-cover rounded-lg sm:block sm:col-span-2 md:col-span-1 lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
            <img src="{{ asset('storage/images/bg3.jpg') }}" alt="" class="hidden w-full h-52 object-cover rounded-lg md:block lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
        </div>
        <dl class="mt-4 text-xs font-medium flex items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
            <dt class="sr-only">Reviews</dt>
            <dd class="text-indigo-600 flex items-center dark:text-indigo-400">
                <svg width="24" height="24" fill="none" aria-hidden="true" class="mr-1 stroke-current dark:stroke-indigo-500">
                    <path d="m12 5 2 5h5l-4 4 2.103 5L12 16l-5.103 3L9 14l-4-4h5l2-5Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>4.78 <span class="text-slate-400 font-normal">(178)</span></span>
            </dd>
            <dt class="sr-only">Location</dt>
            <dd class="flex items-center">
                <svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-3 text-slate-300">
                    <circle cx="1" cy="1" r="1" />
                </svg>
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 text-slate-400 dark:text-slate-500" aria-hidden="true">
                    <path d="M18 11.034C18 14.897 12 19 12 19s-6-4.103-6-7.966C6 7.655 8.819 5 12 5s6 2.655 6 6.034Z" />
                    <path d="M14 11a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                </svg>
                Chuka, Kenya
            </dd>
        </dl>
        <div class="mt-4 col-start-1 row-start-3 self-center sm:mt-0 sm:col-start-2 sm:row-start-2 sm:row-span-2 lg:mt-6 lg:col-start-1 lg:row-start-3 lg:row-end-4">
            <a href="{{ route('register') }}" type="button" class="btn btn-warning font-semibold btn-outline ring ring-orange-700 rounded-full text-white leading-6 py-2 px-3">
                JOIN CODEHACKS&nbsp; <i class="fa-solid fa-shield"></i>
            </a>
        </div>
        <p class="mt-4 text-sm leading-6 col-start-1 sm:col-span-2 lg:mt-6 lg:row-start-4 lg:col-span-1 dark:text-slate-400">
            CodeHacks™️ is a community of programmers who are passionate about coding and are willing to share their knowledge with others.
            <br>
            The best programmers meet here to share their knowledge and help each other grow.
            CodeHack™️ PRO is a paid membership that gives you access to all the courses and resources on the platform.
            The resources include API keys, source code, and other resources that will help you in your programming journey.
            <br>

        </p>
    </div>
</main>
<!--
<section class="contact-cards grid grid-cols-1 md:mt-8 sm:grid-cols-2 h-auto p-2 sm:p-28 gap-4">

    <figure class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bg-slate-800">
        <img class="w-24 h-24 md:w-48 md:rounded-l-xl object-cover md:h-auto md:rounded-none rounded-full mx-auto" src="{{ asset('images/ian.jpg') }}" alt="" width="384" height="512">
        <div class="pt-6 md:p-6 text-center md:text-left space-y-4">
            <blockquote>
                <p class="text-lg font-medium">
                    “We took the incentive to save Kenyans from online scams and provide them with a legit way to make money online.”
                </p>
            </blockquote>
            <figcaption class="font-medium">
                <div class="text-sky-500 dark:text-sky-400">
                    Ian Namenge
                </div>
                <div class="text-slate-700 text-xs mt-1 dark:text-slate-500">
                    CEO, Cashout Kenya
                </div>
            </figcaption>
            <div class="links">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-instagram-square"></i>
                <i class="fab fa-linkedin"></i>
                <i class="fab fa-youtube-square"></i>
                <i class="fab fa-tiktok"></i>
            </div>
        </div>
    </figure>

    <figure class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bg-slate-800">
        <img class="w-24 h-24 md:rounded-l-xl md:w-48 object-cover md:h-auto md:rounded-none rounded-full mx-auto" src="{{ asset('images/raccoon.jpg') }}" alt="" width="384" height="512">
        <div class="pt-6 md:p-6 text-center md:text-left space-y-4">
            <blockquote>
                <p class="text-lg font-medium">
                    "We are also working to establish links with Youtube and ViuSasa to provide our members with more ways earn."
                </p>
            </blockquote>
            <figcaption class="font-medium">
                <div class="text-sky-500 dark:text-sky-400">
                    Steve Tom
                </div>
                <div class="text-slate-700 text-xs mt-1 dark:text-slate-500">
                    Senior Developer
                </div>
            </figcaption>
            <div class="links">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-instagram-square"></i>
                <i class="fab fa-linkedin"></i>
                <i class="fab fa-youtube-square"></i>
                <i class="fab fa-tiktok"></i>
            </div>
        </div>
    </figure>

</section>

-->

</body>
