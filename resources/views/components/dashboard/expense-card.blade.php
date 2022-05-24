
<div {{ $attributes->merge(['class' => 'bg-white rounded-md shadow-md p-4']) }}>
    <h3>{{ $title }}</h3>
    <p>&#163;{{ $slot }}</p>
</div>
