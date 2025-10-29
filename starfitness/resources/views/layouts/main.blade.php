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
        <livewire:components.navigation.top-navigation />
        @yield('content')
    </body>
</html>
