<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-indigo-600 mb-2">📖 My Subjects</h1>
            <p class="text-gray-600">View your enrolled subjects and track your progress</p>
        </div>

        <span></span>

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
                            <div class="flex items-center justify-end space-x-4">
                                <a href="{{ route('student.subjects.show', $subject) }}" 
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors text-sm">
                                    View Details
                                </a>
                                <form id="leave-form-{{ $subject->id }}" 
                                    action="{{ route('student.subjects.leaveSubject', $subject) }}" 
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            onclick="confirmLeave({{ $subject->id }})"
                                            class="px-4 py-2 bg-slate-500 text-white rounded-lg hover:bg-slate-600 transition-colors text-sm">
                                        Leave Subject
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">🚀</div>
                <p class="text-gray-600 text-lg">You have not taken any subjects yet</p>
                <a href="{{ route('student.subjects.available') }}" 
                   class="mt-4 inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    Browse Subjects
                </a>
            </div>
        @endif
    </div>

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmLeave(subjectId) {
            Swal.fire({
                title: 'Confirm Drop Subject',
                text: "Are you sure you want to drop this subject?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, drop it',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('leave-form-' + subjectId).submit();
                }
            });
        }
    </script>
</x-app-layout>