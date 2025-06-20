<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 space-y-8">
        <div class="bg-white rounded-xl shadow-sm p-6 space-y-6">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-indigo-600 mb-2">✏️ Edit Subject</h1>
                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">
                    {{ $subject->code }}
                </span>
            </div>

            <hr class="border-gray-200">

            <!-- Form -->
            <form method="POST" action="{{ route('subjects.update', $subject) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <!-- Name Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subject Name</label>
                        <input type="text" name="name" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                               value="{{ old('name', $subject->name) }}">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" 
                                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 h-32">{{ old('description', $subject->description) }}</textarea>
                    </div>

                    <!-- Code Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subject Code</label>
                        <input type="text" name="code" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                               value="{{ old('code', $subject->code) }}">
                        @error('code')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Credit Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Credit Value</label>
                        <input type="number" name="credit" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"
                               value="{{ old('credit', $subject->credit) }}">
                        @error('credit')
                            <p class="mt-1 text-sm text-red-600 bg-red-50 p-2 rounded-lg">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" 
                            class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors font-semibold shadow-sm">
                        Update Subject
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>