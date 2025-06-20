<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 space-y-8">
        <div class="bg-white rounded-xl shadow-sm p-6 space-y-6">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-indigo-600 mb-2">Edit Task</h1>
                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">
                    {{ $task->subject->code }}
                </span>
            </div>

            <hr class="border-gray-200">

            <!-- Form -->
            <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <!-- Task Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Task Name</label>
                        <input type="text" name="name" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                               placeholder="Enter task name"
                               value="{{ old('name', $task->name) }}">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" 
                                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 h-32"
                                  placeholder="Enter task description">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Points -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Points</label>
                        <input type="number" name="points" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                               placeholder="Enter points value"
                               value="{{ old('points', $task->points) }}">
                        @error('points')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('subjects.show', $task->subject_id) }}" 
                       class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors font-semibold shadow-sm">
                        Update Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>