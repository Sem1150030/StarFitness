@extends('layouts.main')

@section('content')
    <!-- Hero Section -->
    <section class="section-hero">
        <div class="container-custom">
            <div class="text-center">
                <h1 class="heading-xl">Welcome to StarFitness</h1>
                <p class="text-xl sm:text-2xl text-light mb-6">Your Complete Fitness & Nutrition Companion</p>
                <p class="text-lg text-muted mb-10 max-w-2xl mx-auto">Track your food intake, create personalized fitness plans, and achieve your health goals with our comprehensive platform.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="btn-primary">Get Started</a>
                    <a href="#" class="btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section-dark">
        <div class="container-custom">
            <h2 class="heading-lg text-center">Why Choose StarFitness?</h2>
            <p class="text-center text-muted mb-12 max-w-2xl mx-auto">Everything you need to transform your fitness journey and build lasting healthy habits.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1: Food Tracking -->
                <div class="card-hover">
                    <div class="icon-circle bg-gradient-to-br from-green-500 to-emerald-600">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="heading-md">Food Tracking</h3>
                    <p class="text-muted">Log your meals with ease. Track calories, macros, and nutrients to understand your nutrition better and make informed dietary choices.</p>
                </div>

                <!-- Feature 2: Fitness Plans -->
                <div class="card-hover">
                    <div class="icon-circle bg-gradient-to-br from-blue-500 to-cyan-600">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="heading-md">Custom Fitness Plans</h3>
                    <p class="text-muted">Create personalized workout plans tailored to your goals, fitness level, and schedule. Track progress and adjust your routine as you improve.</p>
                </div>

                <!-- Feature 3: Progress Tracking -->
                <div class="card-hover">
                    <div class="icon-circle bg-gradient-to-br from-purple-500 to-pink-600">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="heading-md">Progress Analytics</h3>
                    <p class="text-muted">Monitor your journey with detailed analytics and insights. Visualize your progress and stay motivated with clear performance metrics.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="section-darker">
        <div class="container-custom">
            <h2 class="heading-lg text-center mb-12">How It Works</h2>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-amber-500 text-slate-900 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">1</div>
                    <h3 class="heading-sm">Sign Up</h3>
                    <p class="text-muted">Create your account in minutes and get started with your fitness journey.</p>
                </div>

                <div class="text-center">
                    <div class="bg-amber-500 text-slate-900 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">2</div>
                    <h3 class="heading-sm">Set Goals</h3>
                    <p class="text-muted">Define your fitness and nutrition goals, and let our platform personalize your experience.</p>
                </div>

                <div class="text-center">
                    <div class="bg-amber-500 text-slate-900 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">3</div>
                    <h3 class="heading-sm">Track & Improve</h3>
                    <p class="text-muted">Log your meals, workouts, and watch your progress unfold in real-time.</p>
                </div>

                <div class="text-center">
                    <div class="bg-amber-500 text-slate-900 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">4</div>
                    <h3 class="heading-sm">Achieve</h3>
                    <p class="text-muted">Reach your goals and transform your lifestyle with our comprehensive tools.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="section-hero">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="heading-lg mb-4">Ready to Transform Your Fitness?</h2>
            <p class="text-lg text-light mb-8">Start tracking your fitness journey with StarFitness today.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="btn-primary">Start Free Trial</a>
                <a href="#" class="btn-secondary">Contact Us</a>
            </div>
        </div>
    </section>
@endsection
