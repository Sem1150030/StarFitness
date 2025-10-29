<nav class="bg-slate-900 border-b border-slate-800 sticky top-0 z-50">
    <div class="container-custom">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold text-white hover:text-amber-500 transition duration-300">
                    <span class="text-amber-500">Star</span>Fitness
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-slate-300 hover:text-amber-500 transition duration-300 font-semibold">Home</a>
                <a href="#" class="text-slate-300 hover:text-amber-500 transition duration-300 font-semibold">Features</a>
                <a href="#" class="text-slate-300 hover:text-amber-500 transition duration-300 font-semibold">Pricing</a>
                <a href="#" class="text-slate-300 hover:text-amber-500 transition duration-300 font-semibold">About</a>
                <a href="#" class="text-slate-300 hover:text-amber-500 transition duration-300 font-semibold">Contact</a>
            </div>

            <!-- CTA Button & Mobile Menu -->
            <div class="flex items-center space-x-4">
                <a href="#" class="hidden sm:inline-block bg-amber-500 hover:bg-amber-600 text-slate-900 px-6 py-2 rounded-lg font-bold transition duration-300">
                    Get Started
                </a>

                <!-- Mobile menu button -->
                <button type="button" class="md:hidden text-slate-300 hover:text-amber-500 transition duration-300" @click="mobileMenuOpen = !mobileMenuOpen">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-slate-800 border-t border-slate-700">
        <div class="container-custom py-4 space-y-3">
            <a href="/" class="block text-slate-300 hover:text-amber-500 transition duration-300 font-semibold py-2">Home</a>
            <a href="#" class="block text-slate-300 hover:text-amber-500 transition duration-300 font-semibold py-2">Features</a>
            <a href="#" class="block text-slate-300 hover:text-amber-500 transition duration-300 font-semibold py-2">Pricing</a>
            <a href="#" class="block text-slate-300 hover:text-amber-500 transition duration-300 font-semibold py-2">About</a>
            <a href="#" class="block text-slate-300 hover:text-amber-500 transition duration-300 font-semibold py-2">Contact</a>
            <a href="#" class="block bg-amber-500 hover:bg-amber-600 text-slate-900 px-6 py-2 rounded-lg font-bold transition duration-300 text-center mt-4">
                Get Started
            </a>
        </div>
    </div>
</nav>

@script
<script>
    Alpine.data('mobileMenuOpen', () => ({
        mobileMenuOpen: false
    }));
</script>
@endscript
