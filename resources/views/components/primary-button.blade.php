<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-outline btn-info ring']) }}>
    {{ $slot }}
</button>
