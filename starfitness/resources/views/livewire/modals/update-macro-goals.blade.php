<div class="bg-slate-800 p-6 rounded-lg shadow-2xl">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white mb-2">Update Macro Goals</h2>
        <p class="text-slate-400">Set your daily macro nutrient targets</p>
    </div>

    <form wire:submit="save">
    <div class="mb-4">
            <label for="kcal_goal" class="block text-sm font-medium text-slate-300 mb-2">
                Daily Calories Goal
            </label>
            <input
                type="number"
                id="kcal_goal"
                wire:model="kcal_goal"
                class="w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                placeholder="e.g., 2000"
            >
        </div>

        <div class="mb-4">
            <label for="protein_goal" class="block text-sm font-medium text-slate-300 mb-2">
                Protein Goal (grams)
            </label>
            <input
                type="number"
                id="protein_goal"
                wire:model="protein_goal"
                class="w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                placeholder="e.g., 150"
            >
        </div>

        <div class="mb-4">
            <label for="carbs_goal" class="block text-sm font-medium text-slate-300 mb-2">
                Carbs Goal (grams)
            </label>
            <input
                type="number"
                id="carbs_goal"
                wire:model="carbs_goal"
                class="w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                placeholder="e.g., 200"
            >
        </div>

        <div class="mb-6">
            <label for="fat_goal" class="block text-sm font-medium text-slate-300 mb-2">
                Fat Goal (grams)
            </label>
            <input
                type="number"
                id="fat_goal"
                wire:model="fat_goal"
                class="w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500"
                placeholder="e.g., 70"
            >
        </div>

        <div class="flex justify-end space-x-3">
            <button
                type="button"
                wire:click="$dispatch('closeModal')"
                class="px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition duration-300"
            >
                Cancel
            </button>
            <button
                type="submit"
                class="px-4 py-2 bg-amber-500 text-slate-900 rounded-lg hover:bg-amber-600 font-semibold transition duration-300"
            >
                Save Goals
            </button>
        </div>
    </form>
</div>
