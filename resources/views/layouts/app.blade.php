<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LMS') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Custom Header -->
        <nav class="bg-indigo-600 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Left Side -->
                    <div class="flex items-center space-x-8">
                        @auth {{-- Only show if user is authenticated --}}
                            @if(Auth::user()->is_teacher)
                                <a href="{{ route('teacher.home') }}" class="text-lg font-bold text-white hover:text-indigo-200 transition-colors">
                                    Teacher Dashboard
                                </a>
                                <x-nav-link href="{{ route('subjects.index') }}" :active="request()->routeIs('subjects.index')" class="text-white hover:text-indigo-200">
                                    My Subjects
                                </x-nav-link>
                                <x-nav-link href="{{ route('subjects.create') }}" :active="request()->routeIs('subjects.create')" class="text-white hover:text-indigo-200">
                                    Create Subject
                                </x-nav-link>
                            @else
                                <a href="{{ route('student.home') }}" class="text-lg font-bold text-white hover:text-indigo-200 transition-colors">
                                    Student Dashboard
                                </a>
                                <x-nav-link href="{{ route('student.subjects.my') }}" :active="request()->routeIs('student.subjects.my')" class="text-white hover:text-indigo-200">
                                    My Subjects
                                </x-nav-link>
                                <x-nav-link href="{{ route('student.subjects.available') }}" :active="request()->routeIs('student.subjects.available')" class="text-white hover:text-indigo-200">
                                    Take a Subject
                                </x-nav-link>
                            @endif
                        @endauth
                    </div>

                    <!-- Right Side -->
                    <div class="flex items-center space-x-6">
                        <x-nav-link href="/contact" class="text-white hover:text-indigo-200">
                            Contact
                        </x-nav-link>
                        @auth
                            <span class="text-white">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-white hover:text-indigo-200 text-sm">
                                    Logout
                                </button>
                            </form>
                        @else
                            <x-nav-link :href="route('login')" class="text-white hover:text-indigo-200">
                                Login
                            </x-nav-link>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>

</html>