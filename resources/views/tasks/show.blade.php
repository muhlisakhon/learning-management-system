<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 space-y-8">
        <!-- Task Details Card -->
        <div class="bg-white rounded-xl shadow-sm p-6 space-y-6">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-indigo-600 mb-2">{{ $task->name }}</h1>
                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">
                    {{ $task->subject->code }}
                </span>
            </div>

            <hr class="border-gray-200">

            <!-- Task Details -->

            <div class="space-y-4 text-lg text-gray-700">
                <div class="grid grid-cols-3 gap-4">
                    <!-- Left Column -->
                    <div class="space-y-4 col-span-1">
                        <div>
                            <h3 class="font-semibold text-gray-600 text-sm uppercase">Description:</h3>
                            <p class="text-base">{{ $task->description }}</p>
                        </div>
                        
                        <div>
                            <h3 class="font-semibold text-gray-600 text-sm uppercase">Points:</h3>
                            <p class="text-base">{{ $task->points }}</p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4 col-span-1">
                        <div>
                            <h3 class="font-semibold text-gray-600 text-sm uppercase">Submissions:</h3>
                            <p class="text-base">{{ $task->solutions->count() }}</p>
                        </div>
                        
                        <div>
                            <h3 class="font-semibold text-gray-600 text-sm uppercase">Evaluated:</h3>
                            <p class="text-base">{{ $task->solutions->whereNotNull('points_awarded')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="border-gray-200">

            <!-- Back Button -->
            <div class="flex justify-start">
                <a href="{{ route('subjects.show', $task->subject_id) }}"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors font-semibold shadow-sm">
                    ← Back to Subject
                </a>
            </div>
        </div>

        <!-- Solutions Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 space-y-6">
            <div class="space-y-4">
                <h3 class="text-sm font-semibold text-slate-500 uppercase">📝 Submitted Solutions</h3>
                
                @if($task->solutions->count())
                    <div class="border rounded-lg overflow-hidden">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="text-left py-3 px-4 font-semibold text-slate-600">Student</th>
                                    <th class="text-left py-3 px-4 font-semibold text-slate-600">Submitted</th>
                                    <th class="text-left py-3 px-4 font-semibold text-slate-600">Points</th>
                                    <th class="text-left py-3 px-4 font-semibold text-slate-600">Evaluated</th>
                                    <th class="text-left py-3 px-4 font-semibold text-slate-600">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($task->solutions as $solution)
                                <tr class="hover:bg-slate-50">
                                    <td class="py-3 px-4 text-slate-700">
                                        <div class="font-medium">{{ $solution->student->name ?? '-' }}</div>
                                        <div class="text-slate-600 text-xs">{{ $solution->student->email ?? '-' }}</div>
                                    </td>
                                    <td class="py-3 px-4 text-slate-600">
                                        {{ $solution->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="py-3 px-4 text-slate-600">
                                        {{ $solution->points_awarded ?? '-' }}
                                    </td>
                                    <!-- In resources/views/tasks/show.blade.php -->
                                    <td class="py-3 px-4 text-slate-600">
                                        {{ $solution->evaluated_at ? \Carbon\Carbon::parse($solution->evaluated_at)->format('d/m/Y H:i') : '-' }}
                                    </td>
                                    <td class="py-3 px-4">
                                        @if($solution->points_awarded === null)
                                            <a href="{{ route('solutions.evaluate', $solution->id) }}"
                                                class="px-3 py-1.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-colors text-sm">
                                                Evaluate
                                            </a>
                                        @else
                                            <span class="px-3 py-1.5 bg-slate-100 text-slate-600 rounded-lg text-sm">
                                                Evaluated
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="text-2xl mb-2">📭</div>
                        <p class="text-slate-500">No solutions submitted yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>