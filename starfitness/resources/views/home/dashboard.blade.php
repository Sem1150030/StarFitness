@extends('layouts.main')

@section('content')
    <!-- Welcome Section -->
    <section class="section-dark pt-24">
        <div class="container-custom">
            <!-- Welcome Header -->
            <div class="mb-12 flex justify-between items-start">
                <div>
                    <h1 class="heading-xl">Welcome, {{ auth()->user()->name }}! 👋</h1>
                    <p class="text-light text-lg">Ready to crush your fitness goals today?</p>
                </div>
                <button
                    onclick="Livewire.dispatch('openModal', { component: 'modals.update-macro-goals' })"
                    class="btn-outline flex items-center space-x-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Update Goals</span>
                </button>
            </div>

            <!-- Quick Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Stat Card 1 -->
                <div class="card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-muted text-sm mb-1">Today's Calories</p>
                            <h3 class="heading-md mb-0">{{$dailyLog->totalKcal}} / {{$dailyLog->goal->kcal_goal}}</h3>
                        </div>
                        <div class="icon-circle-sm bg-gradient-to-br from-green-500 to-emerald-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Stat Card 2 -->
                <div class="card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-muted text-sm mb-1">Workouts This Week</p>
                            <h3 class="heading-md mb-0">0 / 5</h3>
                        </div>
                        <div class="icon-circle-sm bg-gradient-to-br from-blue-500 to-cyan-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Stat Card 3 -->
                <div class="card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-muted text-sm mb-1">Current Streak</p>
                            <h3 class="heading-md mb-0">0 Days</h3>
                        </div>
                        <div class="icon-circle-sm bg-gradient-to-br from-purple-500 to-pink-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <h2 class="heading-md mb-6">Quick Actions</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a class="btn-primary cursor-pointer" href="{{route('meals.index')}}">
                        Log Meal
                    </a>
                    <button class="btn-secondary">
                        Start Workout
                    </button>
                    <button class="btn-outline">
                        View Progress
                    </button>
                    <button class="btn-outline">
                        My Plans
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Activity Section -->
    <section class="section-darker">
        <div class="container-custom">
            <h2 class="heading-lg mb-8">Recent Activity</h2>
            <div class="card text-center py-12">
                <svg class="w-16 h-16 text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <p class="text-muted text-lg">No activity yet. Start logging your meals or workouts to see them here!</p>
            </div>
        </div>
    </section>
@endsection
