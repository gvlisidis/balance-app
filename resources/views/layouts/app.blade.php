<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-custom-gray">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                <button x-data="{}" x-on:click="window.livewire.emitTo('create-todo-item', 'show')" class="w-10 h-10 rounded-full bg-indigo-500 text-white font-semibold text-xl fixed bottom-2 right-2">
                    +
                </button>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
        @livewireChartsScripts
    <livewire:create-todo-item/>
    </body>
</html>
