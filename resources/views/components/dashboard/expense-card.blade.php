
<div {{ $attributes->merge(['class' => 'text-xs bg-white rounded-md shadow-md']) }}>
    <div class="border-b border-gray-300">
        <h3 class="px-2 py-1">{{ $title }}</h3>
    </div>

    <div class="px-2 py-1 flex">
        <p class="border-r border-gray-300 pr-2">&#163;{{ $slot }}</p>
        <p class="pl-2">456.34 p.m</p>
    </div>

</div>
