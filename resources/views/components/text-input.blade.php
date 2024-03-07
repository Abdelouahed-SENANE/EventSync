@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full px-5 py-3 text-base focus:border border-gray-200  bg-gray-50 rounded-sm outline-none   focus:ring focus:border-teal-400 focus:outline-none focus:ring-teal-500 focus:ring-opacity-20  ']) !!}>
