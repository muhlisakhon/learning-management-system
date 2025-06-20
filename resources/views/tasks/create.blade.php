<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 space-y-8">
        <div class="bg-white rounded-xl shadow-sm p-6 space-y-6">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-indigo-600 mb-2">📋 Create New Task</h1>
                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">
                    New Task
                </span>
            </div>

            <hr class="border-gray-200">

            <!-- Form -->
            <form method="POST" action="{{ route('tasks.store', $subject) }}" class="space-y-6">
                @csrf

                <div class="space-y-4">
                    <!-- Task Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Task Name <span class="text-indigo-600" title="Required field">★</span>
                        </label>
                        <input type="text" name="name" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                               placeholder="Enter task name"
                               value="{{ old('name') }}">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Task Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Description <span class="text-indigo-600" title="Required field">★</span>
                        </label>
                        <textarea name="description" 
                                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 h-32"
                                  placeholder="Enter task description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Points -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Points <span class="text-indigo-600" title="Required field">★</span>
                        </label>
                        <input type="number" name="points" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                               placeholder="e.g. 10"
                               value="{{ old('points') }}">
                        @error('points')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" 
                            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors font-semibold shadow-sm">
                        Create Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>