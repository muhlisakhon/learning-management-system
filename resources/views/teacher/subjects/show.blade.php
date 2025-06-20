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
                    </div>
                </div>
            </div>
        </div>

        <!-- New Task Button -->
        <div class="flex justify-end">
            <a href="{{ route('tasks.create', $subject) }}"
                class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition transform hover:scale-105 duration-300">
                + New Task
            </a>
        </div>

        <!-- Students Table -->
        <div class="bg-white rounded-lg shadow-sm p-6 space-y-6">
            <div class="space-y-4">
                <h3 class="text-sm font-semibold text-slate-500 uppercase">Students Enrolled</h3>
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

        <!-- Tasks Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 space-y-6">
            <div class="space-y-4">
                <h3 class="text-sm font-semibold text-slate-500 uppercase">Tasks for this Subject</h3>
                <div class="border rounded-lg overflow-hidden">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">TASK NAME</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">POINTS</th>
                                <th class="text-left py-3 px-4 font-semibold text-slate-600">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($subject->tasks as $task)
                            <tr class="hover:bg-slate-50">
                                <td class="py-3 px-4 text-slate-700">{{ $task->name }}</td>
                                <td class="py-3 px-4 text-slate-600">{{ $task->points }}</td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('tasks.show', $task) }}" 
                                        class="px-3 py-1.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors text-sm">
                                            View
                                        </a>
                                        <a href="{{ route('tasks.edit', $task) }}" 
                                        class="px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-gray-800 rounded-lg transition-colors text-sm">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if($subject->tasks->count() == 0)
                            <tr>
                                <td colspan="3" class="py-4 px-4 text-center text-slate-500">No tasks have been assigned to this subject yet</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>