<div class="max-w-md mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="heading-lg">Create Your Account</h1>
        <p class="text-muted">Join StarFitness and start your fitness journey today</p>
    </div>

    <!-- Register Card -->
    <div class="card">
        <form wire:submit="register">
            @csrf

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-white font-semibold mb-2">
                    Full Name
                </label>
                <input
                    type="text"
                    wire:model="name"
                    class="w-full bg-slate-700 border border-slate-600 text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition duration-300"
                    placeholder="John Doe"
                    required
                    autofocus
                >
                @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

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

            <!-- Terms and Conditions -->
            <div class="mb-6">
                <label class="flex items-start">
                    <input
                        type="checkbox"
                        name="terms"
                        class="mt-1 w-4 h-4 text-amber-500 bg-slate-700 border-slate-600 rounded focus:ring-amber-500 focus:ring-2"
                        required
                    >
                    <span class="ml-2 text-sm text-slate-300">
                                    I agree to the <a href="#" class="text-amber-500 hover:text-amber-400">Terms and Conditions</a> and <a href="#" class="text-amber-500 hover:text-amber-400">Privacy Policy</a>
                                </span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full btn-primary">
                Create Account
            </button>
        </form>

        <!-- Login Link -->
        <p class="text-center text-slate-400 mt-6">
            Already have an account?
            <a href="{{route('auth.login')}}" class="text-amber-500 hover:text-amber-400 font-semibold">
                Sign in
            </a>
        </p>
    </div>
</div>
