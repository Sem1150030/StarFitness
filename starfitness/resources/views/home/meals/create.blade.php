@extends('layouts.main')

@section('content')
    <!-- Create Meal Header -->
    <section class="section-dark">
        <div class="container-custom">

            <!-- Create Meal Form -->
            <div class="max-w-4xl mx-auto">
                <div class="mb-6">
                    <div class="flex items-center space-x-3 mb-3">
                        <a href="{{ route('meals.index') }}" class="text-muted hover:text-white transition mr-6">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                        <div>
                            <h1 class="heading-lg">Add New Meal 🍽️</h1>
                            <p class="text-light text-sm">Create a new meal to add to your nutrition tracker</p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="card mb-4">
                        <h2 class="text-lg font-semibold text-white mb-4">Basic Information</h2>

                        <!-- Meal Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-white font-semibold mb-1.5 text-sm">
                                Meal Name <span class="text-red-400">*</span>
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition @error('name') border-red-500 @enderror"
                                placeholder="e.g., Grilled Chicken Salad"
                                required
                            >
                            @error('name')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-white font-semibold mb-1.5 text-sm">
                                Description
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                rows="3"
                                class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition @error('description') border-red-500 @enderror"
                                placeholder="Describe your meal..."
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meal Image -->
{{--                        <div>--}}
{{--                            <label for="image" class="block text-white font-semibold mb-1.5 text-sm">--}}
{{--                                Meal Image--}}
{{--                            </label>--}}
{{--                            <div class="flex items-center space-x-3">--}}
{{--                                <label for="image" class="flex-shrink-0 cursor-pointer">--}}
{{--                                    <div class="w-20 h-20 bg-slate-700 border-2 border-dashed border-slate-600 rounded-lg flex items-center justify-center hover:border-orange-500 transition group">--}}
{{--                                        <div class="text-center">--}}
{{--                                            <svg class="w-6 h-6 mx-auto text-slate-400 group-hover:text-orange-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>--}}
{{--                                            </svg>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </label>--}}
{{--                                <input--}}
{{--                                    type="file"--}}
{{--                                    id="image"--}}
{{--                                    name="image"--}}
{{--                                    accept="image/*"--}}
{{--                                    class="hidden"--}}
{{--                                >--}}
{{--                                <div id="imagePreview" class="hidden">--}}
{{--                                    <img id="preview" class="w-20 h-20 object-cover rounded-lg" alt="Preview">--}}
{{--                                </div>--}}
{{--                                <div class="flex-1">--}}
{{--                                    <p class="text-xs text-muted">Upload a photo of your meal (optional)</p>--}}
{{--                                    <p class="text-xs text-slate-500 mt-0.5">JPG, PNG, GIF (max 5MB)</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @error('image')--}}
{{--                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
                    </div>

                    <!-- Nutrition Information -->
                    <div class="card mb-4">
                        <h2 class="text-lg font-semibold text-white mb-4">Nutrition Information</h2>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <!-- Calories -->
                            <div>
                                <label for="kcal_total" class="block text-white font-medium mb-1.5 text-sm">
                                    <div class="flex items-center space-x-1.5">
                                        <div class="w-2.5 h-2.5 rounded-full bg-gradient-to-br from-orange-500 to-red-600"></div>
                                        <span>Calories</span>
                                    </div>
                                </label>
                                <input
                                    type="number"
                                    id="kcal_total"
                                    name="kcal_total"
                                    value="{{ old('kcal_total') }}"
                                    min="0"
                                    step="1"
                                    class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition @error('kcal_total') border-red-500 @enderror"
                                    placeholder="0"
                                >
                                @error('kcal_total')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Protein -->
                            <div>
                                <label for="protein_total" class="block text-white font-medium mb-1.5 text-sm">
                                    <div class="flex items-center space-x-1.5">
                                        <div class="w-2.5 h-2.5 rounded-full bg-gradient-to-br from-red-500 to-pink-600"></div>
                                        <span>Protein (g)</span>
                                    </div>
                                </label>
                                <input
                                    type="number"
                                    id="protein_total"
                                    name="protein_total"
                                    value="{{ old('protein_total') }}"
                                    min="0"
                                    step="0.1"
                                    class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition @error('protein_total') border-red-500 @enderror"
                                    placeholder="0.0"
                                >
                                @error('protein_total')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Carbohydrates -->
                            <div>
                                <label for="carb_total" class="block text-white font-medium mb-1.5 text-sm">
                                    <div class="flex items-center space-x-1.5">
                                        <div class="w-2.5 h-2.5 rounded-full bg-gradient-to-br from-blue-500 to-cyan-600"></div>
                                        <span>Carbs (g)</span>
                                    </div>
                                </label>
                                <input
                                    type="number"
                                    id="carb_total"
                                    name="carb_total"
                                    value="{{ old('carb_total') }}"
                                    min="0"
                                    step="0.1"
                                    class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('carb_total') border-red-500 @enderror"
                                    placeholder="0.0"
                                >
                                @error('carb_total')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Fat -->
                            <div>
                                <label for="fat_total" class="block text-white font-medium mb-1.5 text-sm">
                                    <div class="flex items-center space-x-1.5">
                                        <div class="w-2.5 h-2.5 rounded-full bg-gradient-to-br from-yellow-500 to-amber-600"></div>
                                        <span>Fat (g)</span>
                                    </div>
                                </label>
                                <input
                                    type="number"
                                    id="fat_total"
                                    name="fat_total"
                                    value="{{ old('fat_total') }}"
                                    min="0"
                                    step="0.1"
                                    class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition @error('fat_total') border-red-500 @enderror"
                                    placeholder="0.0"
                                >
                                @error('fat_total')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Nutrition Summary -->
                        <div class="mt-4 p-3 bg-slate-700/50 rounded-lg border border-slate-600">
                            <div class="flex items-center space-x-2 mb-2">
                                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-xs text-white font-semibold">Macro Breakdown</span>
                            </div>
                            <div class="grid grid-cols-3 gap-3 text-center">
                                <div>
                                    <p class="text-xs text-muted mb-0.5">Protein</p>
                                    <p class="text-sm text-red-400 font-semibold" id="protein-percentage">0%</p>
                                </div>
                                <div>
                                    <p class="text-xs text-muted mb-0.5">Carbs</p>
                                    <p class="text-sm text-blue-400 font-semibold" id="carbs-percentage">0%</p>
                                </div>
                                <div>
                                    <p class="text-xs text-muted mb-0.5">Fat</p>
                                    <p class="text-sm text-yellow-400 font-semibold" id="fat-percentage">0%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between">
                        <a href="{{ route('meals.index') }}" class="btn-outline">
                            Cancel
                        </a>
                        <button type="submit" class="btn-primary">
                            Create Meal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

