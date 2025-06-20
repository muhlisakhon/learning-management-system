<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-sm bg-white rounded-xl shadow-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Welcome back!</h1>
            <p class="text-sm text-gray-600 mb-6">Please sign in to your account</p>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                    <x-text-input
                        id="email"
                        type="email"
                        name="email"
                        class="w-full"
                        placeholder="Enter your email"
                        :value="old('email')"
                        required
                        autofocus
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                    <x-text-input
                        id="password"
                        type="password"
                        name="password"
                        class="w-full"
                        placeholder="Enter your password"
                        required
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="rounded border-gray-300 text-indigo-600" name="remember">
                        <span class="text-sm text-gray-600">Remember me</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                    <a class="text-indigo-600 hover:text-indigo-800 text-sm" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                    Login
                </button>

                <!-- Register Link -->
                <p class="text-center mt-4 text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                        Register here
                    </a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>