<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-indigo-600 mb-2">📚 My Subjects</h1>
            <p class="text-gray-600">Manage your teaching subjects and course materials</p>
        </div>

        <div class="flex justify-end mb-8">
            <a href="{{ route('subjects.create') }}" 
               class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition-colors duration-300">
                + Create New Subject
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

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
                                <span class="mr-2">💎</span>
                                {{ $subject->credit }} Credits
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-100 mt-4 pt-4">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('subjects.show', $subject) }}" 
                                   class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors text-sm">
                                    View
                                </a>
                                <a href="{{ route('subjects.edit', $subject) }}" 
                                   class="px-4 py-2 bg-edit-yellow text-gray-800 rounded-lg hover:bg-edit-yellow-dark transition-colors text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('subjects.destroy', $subject) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                            onclick="confirmDelete(this)" 
                                            class="px-4 py-2 bg-slate-500 text-white rounded-lg hover:bg-slate-600 transition-colors text-sm">
                                        Delete
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
                <p class="text-gray-600 text-lg">You haven't created any subjects yet</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: 'Confirm Deletion',
                text: "This subject will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }
    </script>
</x-app-layout>