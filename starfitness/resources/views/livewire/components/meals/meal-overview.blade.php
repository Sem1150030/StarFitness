<section class="section-darker">
    <div class="container-custom">
        <h2 class="heading-lg mb-4">Today's Meals</h2>

        <!-- Meal Item 1 -->
        @foreach($log->meals as $meal)
        <div class="card mb-3 p-4">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center space-x-2">
                    {{-- icon: use muted slate background instead of bright gradient --}}
                    <div class="w-10 h-10 rounded-lg bg-slate-700 flex items-center justify-center">
                        <span class="text-lg">🥞</span>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-white">{{ $meal->name }}</h3>
                        <p class="text-muted text-xs">{{ $meal->kcal_total }} kcal</p>
                    </div>

                    {{-- Inline meal-total macros: muted colors --}}
                    <div class="ml-4 flex items-center space-x-3 text-xs text-muted">
                        <div class="flex flex-col items-center">
                            <span class="text-muted text-[10px]">Protein</span>
                            <span class="text-slate-300 font-semibold text-sm">{{ $meal->protein_total }}g</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span class="text-muted text-[10px]">Carbs</span>
                            <span class="text-slate-300 font-semibold text-sm">{{ $meal->carb_total }}g</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span class="text-muted text-[10px]">Fat</span>
                            <span class="text-slate-300 font-semibold text-sm">{{ $meal->fat_total }}g</span>
                        </div>
                    </div>
                </div>

                {{-- button hover changed to muted slate --}}
                <button class="text-muted hover:text-slate-300 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Meal Items List -->
            @foreach($meal->mealItems as $item)
                <div class="space-y-1.5 border-t border-slate-700 pt-2">
                    <div class="flex items-center justify-between text-xs">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm">🥞</span>
                            <div>
                                <p class="font-medium text-white">{{$item->name}} <span class="text-muted">× {{$item->pivot->portions}}</span></p>
                            </div>
                        </div>
                        <div class="text-right text-muted">
                            <p>420 kcal · P: 12g C: 55g F: 14g</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        @endforeach


        <!-- Empty State Message -->
        @if(empty($log->meals))
            <div class="card text-center py-6 border-dashed p-4">
                <svg class="w-12 h-12 text-slate-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <p class="text-muted text-sm mb-3">No more meals logged today</p>
                <button class="btn-primary text-sm px-4 py-2">
                    Add a Meal
                </button>
            </div>
        @endif
    </div>
</section>
