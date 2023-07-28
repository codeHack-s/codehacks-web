<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-outline btn-circle btn-warning ring']) }}>
    {{ $slot }}
</button>
