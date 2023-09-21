<x-guest-layout>

<div class="flex justify-center flex-col gap-6 m-3">

    <section class=" w-full flex text-3xl justify-center font-semibold items-center">
        <center>Select Account Type</center>
    </section>

    <section class="links flex gap-3">
        <a class="btn btn-outline btn-primary ring normal-case" href="{{ route('register', ['type' => 'campus']) }}">Codehacks Campus</a>
        <a class="btn btn-outline btn-warning ring normal-case" href="{{ route('register', ['type' => 'innovate']) }}">Codehacks Innovate</a>
    </section>

</div>

</x-guest-layout>
