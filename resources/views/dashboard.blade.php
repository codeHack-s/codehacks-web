<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="flex w-full">
        <div class="w-full sm:px-6 lg:px-8">

            <div class="p-3 sm:p-5 text-gray-900 ">

                <!-- Display greeting according to time of day -->
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">{{ __('Welcome') }}</h3>
                    <p>
                        @php
                            $hour = date('H');
                            if ($hour >= 5 && $hour <= 11) {echo "Good Morning";} else if ($hour >= 12 && $hour <= 18) { echo "Good Afternoon";} else if ($hour >= 19 || $hour <= 4) {echo "Good Evening";}
                        @endphp
                        {{ Auth::user()->first_name  }} {{ Auth::user()->last_name  }}
                    </p>

                    <!-- Display User Balance -->
                    <div class="mb-4">
                    </div>

                    <div class="mb-4 w-full flex flex-wrap gap-4">


                        @php
                            $bgColorClass = Auth::user()->subscription_status === 'pro' ? 'bg-blue-50' : (Auth::user()->subscription_status === 'platinum' ? 'bg-orange-50' : 'bg-base-50');
                            $shadowClass = Auth::user()->subscription_status === 'pro' ? 'shadow-blue' : (Auth::user()->subscription_status === 'platinum' ? 'shadow-orange' : 'shadow');
                            $ringColorClass = Auth::user()->subscription_status === 'pro' ? 'ring-blue-700' : (Auth::user()->subscription_status === 'platinum' ? 'ring-orange-700' : '');
                            $textColorClass = Auth::user()->subscription_status === 'pro' ? 'text-blue-700' : (Auth::user()->subscription_status === 'platinum' ? 'text-orange-700' : '');
                        @endphp

                         <div class="card w-full sm:w-5/12 p-0 rounded {{ $bgColorClass }} {{ $shadowClass }}">
                            <div class="card-body m-[-10px]">
                                <h2 class="card-title">
                                    <!-- User Package -->
                                    Membership Plan
                                </h2>
                                <p>Your membership plan is <span class="font-sans font-bold {{ $textColorClass }} text-2xl">{{ Auth::user()->subscription_status}}</span></p>
                                <div class="card-actions gap-3 justify-end">
                                    <button class="btn ring {{ $ringColorClass }} btn-circle hover:bg-base-100">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </button>
                                    <button class="btn hover:bg-base-100 {{ $ringColorClass }}  btn-circle">
                                        <i class="fa-solid fa-code"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card w-full sm:w-5/12 p-0 rounded {{ $bgColorClass }} {{ $shadowClass }}">
                            <div class="card-body m-[-10px]">
                                <h2 class="card-title">Activity</h2>
                                <p>You have been online for
                                    <span id="timeOnline" class="font-sans font-bold text-orange-700 text-2xl"></span>
                                </p>
                                <div class="card-actions justify-end">
                                    <button class="btn ring {{ $ringColorClass }}  btn-circle">
                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <script>
        var startTime = new Date('{{ Auth::user()->last_login_at }}');

        function updateTime() {
            var currentTime = new Date();
            var timeDiff = Math.floor((currentTime - startTime) / 1000); // in seconds

            var seconds = (timeDiff % 60).toString().padStart(2, "0"); // extract seconds
            timeDiff = Math.floor(timeDiff / 60); // convert to minutes
            var minutes = (timeDiff % 60).toString().padStart(2, "0"); // extract minutes
            timeDiff = Math.floor(timeDiff / 60); // convert to hours
            var hours = (timeDiff % 24).toString().padStart(2, "0"); // extract hours
            var days = Math.floor(timeDiff / 24); // extract days

            var timeOnline = '';
            if(days > 0) {
                timeOnline += days + 'd ';
            }
            timeOnline += hours + 'h ' + minutes + 'm ' + seconds + 's';

            document.getElementById('timeOnline').textContent = timeOnline;
        }

        setInterval(updateTime, 1000); // update every second
    </script>
</x-app-layout>
