<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 space-y-8">
        <div class="bg-white rounded-xl shadow-sm p-6 space-y-6">
            <!-- Header -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                <h1 class="text-2xl font-bold text-indigo-600">Evaluate Solution</h1>
                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">
                    {{ $task->subject->code }}
                </span>
            </div>

            <!-- Task Details -->
            <div class="space-y-4 text-sm">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-gray-500 font-medium">Task Name</h3>
                        <p class="text-gray-700">{{ $task->name }}</p>
                    </div>
                    <div>
                        <h3 class="text-gray-500 font-medium">Task Description</h3>
                        <p class="text-gray-700">{{ $task->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Student Solution -->
            <div class="space-y-2">
                <h3 class="text-sm font-medium text-gray-500">Student Solution</h3>
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    {{ $solution->content }}
                </div>
            </div>

            <!-- Evaluation Form -->
            <form method="POST" action="{{ route('solutions.update', $solution->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Points (0 - {{ $task->points }})
                        </label>
                        <input type="number" name="points" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                               value="{{ old('points') }}">
                        @error('points')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ URL::previous() }}" 
                       class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors font-semibold shadow-sm">
                        Save Evaluation
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>