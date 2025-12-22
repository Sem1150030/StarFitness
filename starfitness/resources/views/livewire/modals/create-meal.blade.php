<div class="bg-slate-800 p-6 rounded-lg shadow-2xl max-w-md w-full mx-auto">
    <!-- Title -->
    <h2 class="text-xl font-semibold text-white mb-6">Create Meal</h2>

    <!-- Form -->
    <form wire:submit.prevent="submit">
        <!-- Meal Name -->
        <div class="mb-6">
            <label for="meal_name" class="block text-white font-medium mb-2 text-sm">
                Meal Name <span class="text-red-400">*</span>
            </label>
            <input
                type="text"
                id="meal_name"
                wire:model="name"
                class="w-full px-3 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                placeholder="e.g., Lunch, Diner"
                required
            >
            @error('name')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end space-x-3">
            <button
                type="button"
                wire:click="$dispatch('closeModal')"
                class="px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition font-medium text-sm"
            >
                Cancel
            </button>
            <button
                type="submit"
                class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition font-medium text-sm"
            >
                Create Meal
            </button>
        </div>
    </form>
</div>
