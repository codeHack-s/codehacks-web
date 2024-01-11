<div>
    <button wire:click="register"
            wire:loading.attr="disabled"
            class="btn w-full btn-secondary btn-sm btn-outline ring-1 ring-offset-1
                {{ $isRegistered ? 'btn-error ring-error' : '' }}
                ">
        <span wire:loading wire:target="register">
                <span
                    class="loading loading-spinner loading-md">
                </span>
        </span>
        <span wire:loading.remove>
            {{ $isRegistered ? 'Unregister' : 'Register' }}

            {!! $isRegistered ? '<i class="fa-solid fa-circle-minus"></i>' : '<i class="fa-solid fa-circle-plus"></i>' !!}
        </span>
    </button>
</div>
