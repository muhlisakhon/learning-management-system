<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LMS Platform') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Navigation -->

        <nav class="bg-indigo-50 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="flex-shrink-0 flex items-center space-x-2">
                            <x-application-logo class="h-10 w-auto text-indigo-900" />
                            <span class="text-indigo-900 font-bold text-xl hidden sm:block">LMS</span>
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" 
                                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-800 transition-colors duration-200">
                            Login
                        </x-nav-link>
                        <a href="{{ route('contact') }}" 
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-800 transition-colors duration-200">
                            Contact
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="bg-gray-50">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8 mt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="/" class="hover:text-indigo-300">Home</a></li>
                            <li><a href="/contact" class="hover:text-indigo-300">Contact</a></li>
                            <li><a href="{{ route('login') }}" class="hover:text-indigo-300">Login</a></li>
                            <li><a href="{{ route('register') }}" class="hover:text-indigo-300">Register</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Contact Information</h3>
                        <p class="mb-2">Email: tukhtasinova2000@gmail.com</p>
                        <p>Phone: +36 30 131-0514</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">About LMS</h3>
                        <p>A platform for teachers and students to collaborate on educational content.</p>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-8 pt-4 text-center">
                    <p>&copy; 2025 Learning Management System. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>