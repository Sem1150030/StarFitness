<div class="p-6 z-50000">
    <h2 class="text-2xl font-bold text-white mb-6">Set Your Macro Goals</h2>

    <form wire:submit.prevent="save">
        <!-- Calories Input -->
        <div class="mb-4">
            <label for="kcal" class="block text-white font-semibold mb-2">
                Calories (kcal)
            </label>
            <input
                type="number"
                id="kcal"
                wire:model="kcal_goal"
                class="w-full bg-slate-700 border border-slate-600 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition duration-300"
                placeholder="2000"
                min="0"
                step="1"
            >
            @error('kcal_goal')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Protein Input -->
        <div class="mb-4">
            <label for="protein" class="block text-white font-semibold mb-2">
                Protein (g)
            </label>
            <input
                type="number"
                id="protein"
                wire:model="protein_goal"
                class="w-full bg-slate-700 border border-slate-600 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition duration-300"
                placeholder="150"
                min="0"
                step="1"
            >
            @error('protein_goal')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Carbs Input -->
        <div class="mb-4">
            <label for="carbs" class="block text-white font-semibold mb-2">
                Carbohydrates (g)
            </label>
            <input
                type="number"
                id="carbs"
                wire:model="carbs_goal"
                class="w-full bg-slate-700 border border-slate-600 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition duration-300"
                placeholder="200"
                min="0"
                step="1"
            >
            @error('carbs_goal')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Fat Input -->
        <div class="mb-6">
            <label for="fat" class="block text-white font-semibold mb-2">
                Fat (g)
            </label>
            <input
                type="number"
                id="fat"
                wire:model="fat_goal"
                class="w-full bg-slate-700 border border-slate-600 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition duration-300"
                placeholder="70"
                min="0"
                step="1"
            >
            @error('fat_goal')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-3">
            <button
                type="button"
                wire:click="$dispatch('closeModal')"
                class="px-6 py-2 bg-slate-700 hover:bg-slate-600 text-white rounded-lg font-semibold transition duration-300"
            >
                Cancel
            </button>
            <button
                type="submit"
                class="px-6 py-2 bg-amber-500 hover:bg-amber-600 text-slate-900 rounded-lg font-bold transition duration-300"
            >
                Save Goals
            </button>
        </div>
    </form>
</div>
