<x-app-layout>

    <div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Welcome, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600 mb-8">
                Use the navigation above to manage your subjects and academic progress.
            </p>
            <div class="flex justify-center space-x-6">
                <a href="{{ route('student.subjects.my') }}" 
                   class="bg-indigo-600 'shadow-lg' hover:bg-indigo-400 text-white font-bold py-3 px-6 rounded-lg shadow-lg 
                          transition-transform duration-300 hover:scale-105">
                    📖 My Subjects
                </a>

                <a href="{{ route('student.subjects.available') }}" 
                   class="bg-indigo-600 'shadow-lg' hover:bg-indigo-400 text-white font-bold py-3 px-6 rounded-lg shadow-lg 
                          transition-transform duration-300 hover:scale-105">
                    ➕ Take a Subject
                </a>
            </div>
        </div>
    </div>
</x-app-layout>