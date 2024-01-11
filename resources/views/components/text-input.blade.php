@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input bg-gray-100 input-bordered input-info']) !!}>
