<div class="relative">
    <div class="flex justify-between items-center mb-4">
        <button wire:click="goToPreviousMonth" class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1 sm:absolute top-1/2 -left-[35px] transition">
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <span class="font-bold">{{ $currentMonth->format('F Y') }}</span>
        <button wire:click="goToNextMonth" class="btn btn-sm btn-circle ring-1 ring-inset ring-offset-1 sm:absolute top-1/2 -right-[35px] transition">
            <i class="fa-solid fa-angle-right"></i>
        </button>
    </div>

    <table class="w-full rounded-md overflow-hidden ring-1 ring-gray-500 border table-fixed border-collapse">
        @foreach(array_chunk($days, 7) as $week)
            <tr>
                @foreach($week as $day)
                    <td class="border font-bold border-gray-200 px-4 py-2 text-center {{ $day['isInRange'] ? 'bg-gray-400 text-black' : '' }} {{ $day['hasLesson'] ? 'bg-orange-500' : '' }}">
                        {{ $day['date']->day }}
                    </td>
                @endforeach
            </tr>
        @endforeach

    </table>
</div>
