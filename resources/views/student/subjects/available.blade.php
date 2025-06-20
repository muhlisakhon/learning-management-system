<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Available Subjects</h1>
            <p class="text-gray-600">Browse and enroll in new subjects</p>
        </div>

        @if($subjects->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($subjects as $subject)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-4">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $subject->name }}</h3>
                            <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">
                                {{ $subject->code }}
                            </span>
                        </div>
                        
                        <p class="text-gray-600 mb-3 text-sm">
                            {{ $subject->description ?? 'No description available' }}
                        </p>
                        
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center text-gray-600">
                                <span class="mr-2">Teacher:</span>
                                {{ $subject->teacher->name ?? 'No teacher assigned' }}
                            </div>
                            <div class="flex items-center text-gray-600">
                                <span class="mr-2">💎</span>
                                {{ $subject->credit }} Credits
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-100 mt-4 pt-4">
                            <div class="flex items-center justify-end">
                                <form method="POST" 
                                      action="{{ route('student.subjects.takeSubject', $subject->id) }}">
                                    @csrf
                                    <button type="submit" 
                                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors text-sm">
                                        Take Subject
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">📚</div>
                <p class="text-gray-600 text-lg">No available subjects to enroll</p>
            </div>
        @endif
    </div>
</x-app-layout>