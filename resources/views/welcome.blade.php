<x-guest-layout>
    <!-- Hero Section -->
    <div class="py-16 bg-gradient-to-b from-indigo-600 to-indigo-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Welcome to the Learning Management System</h1>
            <p class="text-xl text-indigo-100 mb-8 max-w-3xl mx-auto">
                A platform for teachers to create and manage educational content and for students
                to access learning materials and submit their work.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition-colors">
                    Get Started
                </a>
                <a href="{{ route('login') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors">
                    Login
                </a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 mb-16">
                <div class="p-6 bg-indigo-50 rounded-xl">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">For Teachers</h2>
                    <p class="text-gray-600">
                        Create and manage subjects, assign tasks, and evaluate student submissions. 
                        Track student progress and provide feedback.
                    </p>
                </div>
                <div class="p-6 bg-indigo-50 rounded-xl">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">For Students</h2>
                    <p class="text-gray-600">
                        Browse and enroll in subjects, access learning materials, 
                        complete tasks, and submit your work for evaluation.
                    </p>
                </div>
            </div>

            <!-- How It Works -->
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">How It Works</h2>
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="p-6">
                        <div class="bg-indigo-600 text-white w-12 h-12 rounded-full flex items-center justify-center mb-4 mx-auto">1</div>
                        <h3 class="font-semibold mb-2">Register or Login</h3>
                        <p class="text-gray-600">Create an account or sign in with your credentials</p>
                    </div>
                    <div class="p-6">
                        <div class="bg-indigo-600 text-white w-12 h-12 rounded-full flex items-center justify-center mb-4 mx-auto">2</div>
                        <h3 class="font-semibold mb-2">Explore Subjects</h3>
                        <p class="text-gray-600">Browse through the catalog of available subjects</p>
                    </div>
                    <div class="p-6">
                        <div class="bg-indigo-600 text-white w-12 h-12 rounded-full flex items-center justify-center mb-4 mx-auto">3</div>
                        <h3 class="font-semibold mb-2">Enroll & Participate</h3>
                        <p class="text-gray-600">Access materials and complete assignments</p>
                    </div>
                    <div class="p-6">
                        <div class="bg-indigo-600 text-white w-12 h-12 rounded-full flex items-center justify-center mb-4 mx-auto">4</div>
                        <h3 class="font-semibold mb-2">Track Progress</h3>
                        <p class="text-gray-600">Monitor submissions and review feedback</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>