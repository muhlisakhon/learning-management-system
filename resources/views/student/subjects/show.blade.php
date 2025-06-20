<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 space-y-8">
        <!-- Upper Section Card -->
        <div class="bg-white rounded-xl shadow-sm p-6 space-y-6">
            <!-- Subject Header -->
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $subject->name }}</h1>
                    <p class="text-lg text-gray-600">{{ $subject->credit }} Credits</p>
                </div>
                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">
                    {{ $subject->code }}
                </span>
            </div>

            <hr class="border-gray-200">

            <!-- Description Section -->
            <div class="space-y-2">
                <h3 class="text-sm font-semibold text-gray-500 uppercase">Description</h3>
                <p class="text-gray-700">{{ $subject->description ?? '-' }}</p>
            </div>

            <hr class="border-gray-200">

            <!-- Information Grid -->
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase">Information</h3>
                    <div class="space-y-1 text-sm">
                        <p class="text-gray-600">
                            <span class="font-medium">Created:</span> 
                            {{ $subject->created_at->format('d/m/Y') }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-medium">Last Updated:</span> 
                            {{ $subject->updated_at->format('d/m/Y') }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-medium">Students Enrolled:</span> 
                            {{ $subject->students->count() }}
                        </p>
                        <p class="text-gray-600">
                            <span class="font-medium">Teacher:</span> 
                            {{ $subject->teacher->name ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Students Table (Unchanged from previous version) -->
        <div class="bg-white rounded-lg shadow-sm p-6 space-y-6">
            <div class="space-y-4">
                <h3 class="text-sm font-semibold text-slate-500 uppercase">Students</h3>
                <div class="border rounded-lg overflow-hidden">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">NAME</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">EMAIL</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($subject->students as $student)
                            <tr>
                                <td class="py-3 px-4 text-slate-700">{{ $student->name }}</td>
                                <td class="py-3 px-4 text-slate-600">{{ $student->email }}</td>
                            </tr>
                            @endforeach
                            @if($subject->students->count() == 0)
                            <tr>
                                <td colspan="2" class="py-4 px-4 text-center text-slate-500">No students enrolled yet</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tasks Table (Unchanged from previous version) -->
        <div class="bg-white rounded-lg shadow-sm p-6 space-y-6">
            <div class="space-y-4">
                <h3 class="text-sm font-semibold text-slate-500 uppercase">Tasks</h3>
                <div class="border rounded-lg overflow-hidden">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">TASK NAME</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">POINTS</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">STATUS</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($subject->tasks as $task)
                            <tr>
                                <td class="py-3 px-4 text-slate-700">{{ $task->name }}</td>
                                <td class="py-3 px-4 text-slate-600">{{ $task->points }}</td>
                                <td class="py-3 px-4">
                                    @if($task->solutions->where('user_id', auth()->id())->first())
                                        <span class="text-green-600">Submitted</span>
                                    @else
                                        <span class="text-red-600">Not Submitted</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('student.tasks.show', $task) }}" 
                                       class="text-indigo-600 hover:text-indigo-400 transition-colors">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @if($subject->tasks->count() == 0)
                            <tr>
                                <td colspan="4" class="py-4 px-4 text-center text-slate-500">No tasks have been assigned to this subject yet</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>