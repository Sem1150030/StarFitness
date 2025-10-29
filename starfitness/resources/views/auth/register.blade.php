@extends('layouts.main')

@section('title', 'Register - ' . config('app.name'))

@section('content')
    <section class="section-dark min-h-screen flex items-center justify-center py-12">
        <div class="container-custom">
            @livewire('components.auth.register-form')
        </div>
    </section>
@endsection

