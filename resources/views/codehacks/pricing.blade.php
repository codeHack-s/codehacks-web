<x-app-layout>
    <div class="text-center my-5">
        <section class="flex justify-center">
            <h1 class="text-3xl font-bold text-gray-900">Pricing
            </h1>
            <span class="badge badge-primary text-xs">BETA</span>
        </section>
        <p class="text-lg text-gray-600">Choose a plan that suits you</p>
    </div>

    <div class="flex flex-wrap gap-4 justify-center my-5">
        <!-- Gold Pricing Card -->
        <div class="card w-[300px] sm:w-64 bg-warning shadow-xl mx-4 my-4">
            <figure><img src="{{ asset('images/bg2.jpg') }}" alt="" /></figure>
            <div class="card-body p-4">
                <h2 class="text-xl font-semibold mb-2">Gold</h2>
                <ul class="list-disc pl-6 mb-4">
                    <li>Access to essential features</li>
                    <li>24/7 customer support</li>
                    <li>Limited API Access</li>
                </ul>
                <div class="flex justify-end">
                    <section data-tip="Select Gold Plan" class="tooltip tooltip-error tooltip-left">
                        <a href="{{ route('pricing.gold') }}">
                            <button class="btn btn-circle ring">
                                <i class="fa-solid fa-laptop-code"></i>
                            </button>
                        </a>
                    </section>
                </div>
            </div>
        </div>

        <!-- Platinum Pricing Card -->
        <div class="card w-[300px] sm:w-64 bg-blue-400 shadow-xl mx-4 my-4">
            <figure><img src="{{ asset('images/bg2.jpg') }}" alt="" /></figure>
            <div class="card-body p-4">
                <h2 class="text-xl font-semibold mb-2">Platinum</h2>
                <ul class="list-disc pl-6 mb-4">
                    <li>Access to premium features</li>
                    <li>24/7 priority customer support</li>
                    <li>Generous API Usage</li>
                </ul>
                <div class="flex justify-end">
                    <section data-tip="Select Platinum Plan" class="tooltip tooltip-warning tooltip-left">
                        <a href="{{ route('pricing.platinum') }}">
                            <button class="btn btn-circle ring">
                                <i class="fa-solid fa-meteor"></i>
                            </button>
                        </a>
                    </section>
                </div>
            </div>
        </div>

        <!-- CodeHacks Pro Pricing Card -->
        <div class="card w-[300px] sm:w-64 bg-error shadow-xl mx-4 my-4">
            <figure><img src="{{ asset('images/bg2.jpg') }}" alt="" /></figure>
            <div class="card-body p-4">
                <h2 class="text-xl font-semibold mb-2">CodeHacks Pro</h2>
                <ul class="list-disc pl-6 mb-4">
                    <li>Access to advanced features</li>
                    <li>24/7 dedicated support</li>
                    <li>Expanded API Access</li>
                </ul>
                <div class="flex justify-end">
                    <section data-tip="Select Pro Plan" class="tooltip tooltip-primary tooltip-left">
                        <a href="{{ route('pricing.pro') }}">
                            <button class="btn btn-circle ring">
                                <i class="fa-solid fa-rocket"></i>
                            </button>
                        </a>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
