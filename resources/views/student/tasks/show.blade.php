<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 space-y-8">
        <!-- Success Message -->
        @if(session('submission_success'))
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8 border border-emerald-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="text-emerald-600 font-medium">Solution submitted successfully!</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('student.subjects.show', $task->subject) }}" 
                       class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                        Back to Subject
                    </a>
                    <button onclick="resetForm()" 
                            class="text-emerald-600 hover:text-emerald-800 text-sm font-medium">
                        Submit Again
                    </button>
                </div>
            </div>
        </div>
        @endif

        <!-- Task Details Card -->
        <div class="bg-white rounded-xl shadow-sm p-6 space-y-6">
            <!-- Task Header -->
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $task->name }}</h1>
                    <div class="text-lg text-gray-600">
                        <span>Subject: {{ $task->subject->name }}</span> | 
                        <span>Teacher: {{ $task->subject->teacher->name }}</span>
                    </div>
                </div>
                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">
                    {{ $task->points }} Points
                </span>
            </div>

            <hr class="border-gray-200">

            <!-- Description Section -->
            <div class="space-y-2">
                <h3 class="text-sm font-semibold text-gray-500 uppercase">Description</h3>
                <p class="text-gray-700">{{ $task->description }}</p>
            </div>

            <hr class="border-gray-200">

            <!-- Solution Submission Section -->
            <div class="space-y-6">
                <h3 class="text-sm font-semibold text-gray-500 uppercase">Submit Solution</h3>
                
                <form action="{{ route('student.tasks.submit', $task) }}" method="POST" class="space-y-6" id="solutionForm">
                    @csrf
                    
                    <textarea name="solution_text" rows="5"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-4"
                        placeholder="Type your solution here...">{{ old('solution_text') }}</textarea>

                    @error('solution_text')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors text-base font-semibold">
                            Submit Solution
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function resetForm() {
            document.getElementById('solutionForm').reset();
            window.scrollTo({
                top: document.getElementById('solutionForm').offsetTop - 100,
                behavior: 'smooth'
            });
        }
    </script>
</x-app-layout>