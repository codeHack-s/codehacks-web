<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-aut px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">

                <center>
                    <h1 class="mt-10 mb-5 text-center text-3xl font-semibold">
                        Upcoming Events
                    </h1>
                </center>

                <div class="course-card relative">
                    <a href="#">
                        <img class="rounded-t-lg w-full object-cover" src="{{asset('storage/1693925608.jpg')}}"
                             alt="product image"/>
                    </a>
                    <div class="px-2 sm:px-3 md:px-4 pb-5">

                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight">
                                The last CodeHack
                            </h5>
                        </a>

                        <div class="flex absolute text-orange-50 top-0 z-50 items-center mt-2.5 mb-5">
                            <div data-tip="not supported"
                                 class="flex text-[8px] tooltip items-center space-x-1 rtl:space-x-reverse">
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                            </div>
                            <span
                                class="bg-blue-100 hidden text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold">
                                8 Lessons
                            </span>
                            <span class="text-sm font-semibold space-x-2 text-gray-400">
                                <a href="#" class="">
                                    <i class="fa-regular fa-bookmark"></i>
                                </a>
                            @can('manage')
                                    <a href="">
                                    <i class="fa-solid fa-gear"></i>
                                </a>
                                @endcan
                            </span>
                        </div>
                    </div>

                    <button
                        class="w-full py-3 text-sm font-semibold text-white uppercase bg-blue-500 rounded-b-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200">
                        Register
                    </button>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
