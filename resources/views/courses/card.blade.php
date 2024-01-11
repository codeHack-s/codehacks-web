<div class="course-card relative">
    <a href="{{ route('courses.show', $course->slug) }}">
        <img class="rounded-t-lg w-full object-cover" src="{{asset('storage/1693925608.jpg')}}"
             alt="product image"/>
    </a>

    <div class="flex justify-between gap-2 px-1 sm:px-2 py-3">

        <a class="w-10/12" href="{{ route('courses.show', $course->slug) }}">
            <h5 class="text-sm whitespace-nowrap text-ellipsis overflow-x-clip font-normal tracking-tight">
                {{$course->title}}
            </h5>
        </a>

        <div class="flex absolute text-orange-50 top-0 z-20 items-center mt-2.5 mb-5">
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

        <div class="flex w-2/12 flex-col items-center justify-between">
            <span class="text-[10px] absolute top-0 right-3 mt-2.5 text-black font-medium">
                {{$course->lessons_number}} {{ $course->lessons_number == 1 ? 'Lesson' : 'Lessons' }}
            </span>
            <span class="text-sm flex flex-col font-semibold text-gray-400">
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

    <div>
        <button wire:click="register"
                wire:loading.attr="disabled"
                class="w-full py-2 text-sm relative font-semibold text-white uppercase bg-blue-500 rounded-b-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200
                {{ $isRegistered ? 'bg-red-500 hover:bg-red-600' : '' }}
                ">
            <span wire:loading wire:target="register">
                <span
                    class="loading loading-spinner loading-md absolute inset-0 top-1/2 transform -translate-y-1/2 left-1/2 -translate-x-1/2">
                </span>
            </span>
            <span wire:loading.remove>
                {{ $isRegistered ? 'Unregister' : 'Register' }}
            </span>
        </button>
    </div>

</div>
