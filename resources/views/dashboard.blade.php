<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-aut px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">

                <div class="w-full sm:max-w-xs bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg w-full object-cover" src="{{asset('storage/1693925608.jpg')}}" alt="product image" />
                    </a>
                    <div class="px-2 sm:px-3 md:px-4 pb-5">

                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-800">
                                The last CodeHack
                            </h5>
                        </a>

                        <div class="flex items-center mt-2.5 mb-5">
                            <div data-tip="not supported" class="flex tooltip items-center space-x-1 rtl:space-x-reverse">
                                <i class='fa-solid fa-star text-yellow-300'></i>
                                <i class='fa-solid fa-star text-yellow-300'></i>
                                <i class='fa-solid fa-star text-yellow-300'></i>
                                <i class='fa-solid fa-star text-yellow-300'></i>
                                <i class='fa-solid fa-star text-yellow-300'></i>
                            </div>
                            <span class="bg-blue-100 hidden text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-semibold text-gray-600">
                                8 Lessons
                            </span>
                            <a href="#" class="">
                                <i class="fa-regular fa-bookmark"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
