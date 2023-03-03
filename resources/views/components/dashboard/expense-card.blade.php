
<div {{ $attributes->merge(['class' => 'text-xxs sm:text-sm bg-white rounded-md shadow-md']) }}>
    <div class="border-b border-gray-300">
        <h3 class="px-2 py-1">{{ $title }}</h3>
    </div>

    <div class="px-2 py-2">
        <p>&#163;{{ $slot }}</p>
    </div>

</div>
