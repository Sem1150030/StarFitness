
@extends('layouts.main')

@section('content')
    <!-- Meals Tracker Header -->
    <section class="section-dark pt-24">
        <div class="container-custom">
            <div class="mb-12 flex items-center justify-between">
                <div>
                    <h1 class="heading-xl">Meals Tracker 🍽️</h1>
                    <p class="text-light text-lg">Track your daily nutrition and reach your goals</p>
                </div>
                <button class="btn-primary">
                    + Log Meal
                </button>
            </div>

            <!-- Daily Nutrition Summary -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Total Calories -->
                <div class="card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-muted text-sm">Total Calories</p>
                        <div class="icon-circle-sm bg-gradient-to-br from-orange-500 to-red-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="heading-md mb-2">{{$dailyLog->totalKcal}} / {{$dailyLog->goal->kcal_goal}}</h3>
                    <div class="w-full bg-slate-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-orange-500 to-red-600 h-2 rounded-full"
                             style=" width: {{($dailyLog->totalKcal / $dailyLog->goal->kcal_goal) * 100}}%; max-width: 100%;"
                            ></div>
                    </div>
                </div>

                <!-- Protein -->
                <div class="card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-muted text-sm">Protein</p>
                        <div class="icon-circle-sm bg-gradient-to-br from-red-500 to-pink-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="heading-md mb-2">{{$dailyLog->totalProtein}}g / {{$dailyLog->goal->protein_goal}}g</h3>
                    <div class="w-full bg-slate-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-red-500 to-pink-600 h-2 rounded-full" style="width: {{($dailyLog->totalProtein / $dailyLog->goal->protein_goal) * 100}}%; max-width: 100%;"></div>
                    </div>
                </div>

                <!-- Carbs -->
                <div class="card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-muted text-sm">Carbohydrates</p>
                        <div class="icon-circle-sm bg-gradient-to-br from-blue-500 to-cyan-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="heading-md mb-2">{{$dailyLog->totalCarb}}g / {{$dailyLog->goal->carbs_goal}}g</h3>
                    <div class="w-full bg-slate-700 rounded-full h-2">
                        <div
                            class="bg-gradient-to-r from-blue-500 to-cyan-600 h-2 rounded-full"
                            style="width: {{($dailyLog->totalCarb / $dailyLog->goal->carbs_goal) * 100}}%; max-width: 100%;">
                        </div>
                    </div>
                </div>

                <!-- Fat -->
                <div class="card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-muted text-sm">Fat</p>
                        <div class="icon-circle-sm bg-gradient-to-br from-yellow-500 to-amber-600">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3v-6"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="heading-md mb-2">{{$dailyLog->totalFat}}g / {{$dailyLog->goal->fat_goal}}g</h3>
                    <div class="w-full bg-slate-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-yellow-500 to-amber-600 h-2 rounded-full" style="width: {{($dailyLog->totalFat / $dailyLog->goal->fat_goal) * 100}}%; max-width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meals List Section -->
    @livewire('components.meals.meal-overview', ['log' => $dailyLog])

    <!-- Meal History Section -->
    <section class="section-dark">
        <div class="container-custom">
            <h2 class="heading-lg mb-8">Recent Meals (Last 7 Days)</h2>

            <!-- History Table -->
            <div class="card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-slate-700 bg-slate-900">
                                <th class="px-6 py-4 text-left text-muted font-semibold">Date</th>
                                <th class="px-6 py-4 text-left text-muted font-semibold">Meal Name</th>
                                <th class="px-6 py-4 text-center text-muted font-semibold">Calories</th>
                                <th class="px-6 py-4 text-center text-muted font-semibold">Protein</th>
                                <th class="px-6 py-4 text-center text-muted font-semibold">Carbs</th>
                                <th class="px-6 py-4 text-center text-muted font-semibold">Fat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-slate-700 hover:bg-slate-700 transition">
                                <td class="px-6 py-4 text-slate-300">Today</td>
                                <td class="px-6 py-4 text-white">Breakfast</td>
                                <td class="px-6 py-4 text-center text-amber-400 font-semibold">650</td>
                                <td class="px-6 py-4 text-center text-red-400">18g</td>
                                <td class="px-6 py-4 text-center text-blue-400">85g</td>
                                <td class="px-6 py-4 text-center text-yellow-400">22g</td>
                            </tr>
                            <tr class="border-b border-slate-700 hover:bg-slate-700 transition">
                                <td class="px-6 py-4 text-slate-300">Today</td>
                                <td class="px-6 py-4 text-white">Lunch</td>
                                <td class="px-6 py-4 text-center text-green-400 font-semibold">420</td>
                                <td class="px-6 py-4 text-center text-red-400">45g</td>
                                <td class="px-6 py-4 text-center text-blue-400">28g</td>
                                <td class="px-6 py-4 text-center text-yellow-400">15g</td>
                            </tr>
                            <tr class="border-b border-slate-700 hover:bg-slate-700 transition">
                                <td class="px-6 py-4 text-slate-300">Yesterday</td>
                                <td class="px-6 py-4 text-white">Breakfast</td>
                                <td class="px-6 py-4 text-center text-amber-400 font-semibold">580</td>
                                <td class="px-6 py-4 text-center text-red-400">22g</td>
                                <td class="px-6 py-4 text-center text-blue-400">72g</td>
                                <td class="px-6 py-4 text-center text-yellow-400">18g</td>
                            </tr>
                            <tr class="border-b border-slate-700 hover:bg-slate-700 transition">
                                <td class="px-6 py-4 text-slate-300">Yesterday</td>
                                <td class="px-6 py-4 text-white">Lunch</td>
                                <td class="px-6 py-4 text-center text-green-400 font-semibold">520</td>
                                <td class="px-6 py-4 text-center text-red-400">52g</td>
                                <td class="px-6 py-4 text-center text-blue-400">35g</td>
                                <td class="px-6 py-4 text-center text-yellow-400">12g</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Nutrition Tips Section -->
    <section class="section-darker">
        <div class="container-custom">
            <h2 class="heading-lg mb-8">Nutrition Tips 💡</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Tip 1 -->
                <div class="card">
                    <div class="flex items-start space-x-4">
                        <div class="icon-circle-sm bg-gradient-to-br from-green-500 to-emerald-600 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="heading-sm mb-2">Stay Hydrated</h3>
                            <p class="text-muted text-sm">Drink at least 8 glasses of water daily to support metabolism and digestion.</p>
                        </div>
                    </div>
                </div>

                <!-- Tip 2 -->
                <div class="card">
                    <div class="flex items-start space-x-4">
                        <div class="icon-circle-sm bg-gradient-to-br from-blue-500 to-cyan-600 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="heading-sm mb-2">Balance Your Macros</h3>
                            <p class="text-muted text-sm">Aim for a balanced ratio of proteins, carbs, and fats for optimal results.</p>
                        </div>
                    </div>
                </div>

                <!-- Tip 3 -->
                <div class="card">
                    <div class="flex items-start space-x-4">
                        <div class="icon-circle-sm bg-gradient-to-br from-purple-500 to-pink-600 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="heading-sm mb-2">Meal Timing</h3>
                            <p class="text-muted text-sm">Spread your meals throughout the day for sustained energy levels.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

