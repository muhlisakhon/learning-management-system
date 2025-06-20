<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-sm bg-white rounded-xl shadow-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Create Account</h1>
            <p class="text-sm text-gray-600 mb-6">Register as a new student</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                    <x-text-input
                        id="name"
                        type="text"
                        name="name"
                        class="w-full"
                        placeholder="Enter your name"
                        :value="old('name')"
                        required
                        autofocus
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

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

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                    <x-text-input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="w-full"
                        placeholder="Confirm your password"
                        required
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Register Button -->
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-3 rounded-lg text-sm font-medium hover:bg-indigo-700 transition-colors">
                    Register
                </button>

                <!-- Login Link -->
                <p class="text-center mt-4 text-sm text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                        Login here
                    </a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>