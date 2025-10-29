<div class="max-w-lg mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="heading-lg">Login To Your Account</h1>
        <p class="text-muted">Welcome back to continue your journey</p>
    </div>

    <!-- Login Card -->
    <div class="card">
        <form wire:submit="login">
            @csrf
            <!-- Email Field -->
            <div class="mb-6">
                <label for="email" class="block text-white font-semibold mb-2">
                    Email Address
                </label>
                <input
                    type="email"
                    wire:model="email"
                    class="w-full bg-slate-700 border border-slate-600 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition duration-300"
                    placeholder="john@example.com"
                    required
                >
                @error('email')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-6">
                <label for="password" class="block text-white font-semibold mb-2">
                    Password
                </label>
                <input
                    type="password"
                    wire:model="password"
                    class="w-full bg-slate-700 border border-slate-600 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition duration-300"
                    placeholder="••••••••"
                    required
                >
                @error('password')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Submit Button -->
            <button type="submit" class="w-full btn-primary">
                Login
            </button>
        </form>

        <!-- Login Link -->
        <p class="text-center text-slate-400 mt-6">
            Dont have an account?
            <a href="{{route('auth.register')}}" class="text-amber-500 hover:text-amber-400 font-semibold">
                Sign up
            </a>
        </p>
    </div>
</div>
