<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-slate-900">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name'))</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('head')
    </head>
    <body class="bg-slate-900">
    <div id="toast-container" class="fixed top-5 right-5 z-50 space-y-2">
    @if(session('status'))
        @php
            $status = session('status');
        @endphp
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)"
                x-show="show"
                class="px-4 py-2 rounded shadow text-white"
                :class="{
                    'bg-green-500': '{{ $status['type'] }}' === 'success',
                    'bg-red-500': '{{ $status['type'] }}' === 'error'
                }">
                {{ $status['message'] }}
            </div>
        @endif
        </div>
        <livewire:components.navigation.top-navigation />
        @yield('content')
    </body>
</html>
