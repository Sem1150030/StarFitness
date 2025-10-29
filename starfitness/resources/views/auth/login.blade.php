@extends('layouts.main')

@section('title', 'Login - ' . config('app.name'))

@section('content')
    <section class="section-dark min-h-screen flex items-center justify-center py-12">
        <div class="container-custom">
            @livewire('components.auth.login-form')
        </div>
    </section>
@endsection

