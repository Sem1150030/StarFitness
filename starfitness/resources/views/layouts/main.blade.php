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
        <div class="fixed top-20 right-5 z-50 space-y-2">
            @php
                $notifications = [
                    'success' => ['color' => 'bg-green-500 text-white', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    'error'   => ['color' => 'bg-red-500 text-white', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    'warning' => ['color' => 'bg-amber-500 text-slate-900', 'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
                    'info'    => ['color' => 'bg-blue-500 text-white', 'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ];
            @endphp

            @foreach ($notifications as $type => $data)
                @if(session($type))
                    <div
                        x-data="{ show: true }"
                        x-init="setTimeout(() => show = false, 5000)"
                        x-show="show"
                        x-transition:enter="transform ease-out duration-300 transition"
                        x-transition:enter-start="translate-x-full opacity-0"
                        x-transition:enter-end="translate-x-0 opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="{{ $data['color'] }} px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 min-w-[300px]"
                    >
                        <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $data['icon'] }}"></path>
                        </svg>
                        <span class="flex-1">{{ session($type) }}</span>
                        <button @click="show = false" class="{{ $type === 'warning' ? 'text-slate-900 hover:text-slate-700' : 'text-white hover:text-gray-200' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endif
            @endforeach
        </div>

        <livewire:components.navigation.top-navigation />
        @yield('content')
    </body>
</html>
