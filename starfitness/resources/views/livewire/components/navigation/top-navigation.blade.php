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
                @if($user)
                    <!-- Desktop Profile Dropdown -->
                    <div class="hidden sm:block relative">
                        <button wire:click="toggleDropdown" class="flex items-center space-x-3 focus:outline-none">
                            <div class="w-10 h-10 bg-amber-500 rounded-full flex items-center justify-center text-slate-900 font-bold cursor-pointer hover:bg-amber-600 transition duration-300">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <span class="text-white font-semibold">{{ $user->name }}</span>
                            <svg class="w-4 h-4 text-slate-300 transition-transform duration-200 {{ $dropdownOpen ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        @if($dropdownOpen)
                            <div class="absolute right-0 mt-2 w-64 bg-slate-800 rounded-lg shadow-xl border border-slate-700 py-2 z-50"
                                 x-data
                                 @click.away="$wire.closeDropdown()">
                                <div class="px-4 py-3 border-b border-slate-700">
                                    <p class="text-white font-semibold">{{ $user->name }}</p>
                                    <p class="text-slate-400 text-sm">{{ $user->email }}</p>
                                </div>
                                <a href="#" class="block px-4 py-2 text-slate-300 hover:bg-slate-700 hover:text-amber-500 transition duration-300">
                                    Profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-slate-300 hover:bg-slate-700 hover:text-amber-500 transition duration-300">
                                    Settings
                                </a>
                                <div class="border-t border-slate-700 mt-2 pt-2">
                                    <button wire:click="logout" class="w-full text-left px-4 py-2 text-red-400 hover:bg-slate-700 hover:text-red-300 transition duration-300">
                                        Logout
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <a href="{{route('auth.register')}}" class="hidden sm:inline-block bg-amber-500 hover:bg-amber-600 text-slate-900 px-6 py-2 rounded-lg font-bold transition duration-300">
                        Get Started
                    </a>
                @endif

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
            @if($user)
                <div class="border-t border-slate-700 pt-4 mt-4">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-amber-500 rounded-full flex items-center justify-center text-slate-900 font-bold">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-white font-semibold">{{ $user->name }}</p>
                            <p class="text-slate-400 text-sm">{{ $user->email }}</p>
                        </div>
                    </div>
                    <a href="#" class="block text-slate-300 hover:text-amber-500 transition duration-300 font-semibold py-2">
                        Profile
                    </a>
                    <a href="#" class="block text-slate-300 hover:text-amber-500 transition duration-300 font-semibold py-2">
                        Settings
                    </a>
                    <button wire:click="logout" class="w-full text-left text-red-400 hover:text-red-300 transition duration-300 font-semibold py-2 mt-2">
                        Logout
                    </button>
                </div>
            @else
                <a href="#" class="block bg-amber-500 hover:bg-amber-600 text-slate-900 px-6 py-2 rounded-lg font-bold transition duration-300 text-center mt-4">
                    Get Started
                </a>
            @endif


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
