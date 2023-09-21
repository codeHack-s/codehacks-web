<x-guest-layout>

<div class="flex justify-center flex-col gap-6 my-3">

    <section class=" w-full flex text-3xl justify-center font-semibold items-center">
        <center>Select Account Type</center>
    </section>

    <section class="links flex justify-center mb-4 gap-3">
        <div data-tip="For Chuka Uni students"  class="tooltip tooltip-bottom">
            <a class="btn btn-outline btn-primary ring normal-case" href="{{ route('register', ['type' => 'campus']) }}">Codehacks Campus</a>
        </div>
        <div data-tip="Online Learning"  class="tooltip tooltip-bottom">
            <a class="btn btn-outline btn-warning ring normal-case" href="{{ route('register', ['type' => 'innovate']) }}">Codehacks Innovate</a>
        </div>

    </section>

</div>

</x-guest-layout>
