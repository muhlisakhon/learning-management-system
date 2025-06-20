<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        if (!Auth::user()->is_teacher) {
            abort(403, 'Unauthorized.');
        }

        $subjects = Subject::where('user_id', Auth::id())->get();
        return view('teacher.subjects.index', compact('subjects'));
    }

    public function create()
    {
        if (!Auth::user()->is_teacher) {
            abort(403, 'Unauthorized.');
        }

        return view('teacher.subjects.create');
    }

    public function store(Request $request)
    {
        if (!Auth::user()->is_teacher) {
            abort(403, 'Unauthorized.');
        }

        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|string',
            'code' => 'required|regex:/^IK-[A-Z]{3}[0-9]{3}$/|unique:subjects,code',
            'credit' => 'required|numeric',
        ]);

        $validated['user_id'] = Auth::id();

        Subject::create($validated);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully!');
    }

    public function show(Subject $subject)
    {
        if (!Auth::user()->is_teacher) {
            abort(403, 'Unauthorized.');
        }

        $subject->load('students','tasks');
        return view('teacher.subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        if (!Auth::user()->is_teacher) {
            abort(403, 'Unauthorized.');
        }

        return view('teacher.subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        if (!Auth::user()->is_teacher) {
            abort(403, 'Unauthorized.');
        }

        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|string',
            'code' => 'required|regex:/^IK-[A-Z]{3}[0-9]{3}$/|unique:subjects,code,' . $subject->id,
            'credit' => 'required|numeric',
        ]);

        $subject->update($validated);

        return redirect()->route('subjects.show', $subject)->with('success', 'Subject updated successfully!');
    }

    public function destroy(Subject $subject)
    {
        if (!Auth::user()->is_teacher) {
            abort(403, 'Unauthorized.');
        }

        $subject->delete(); // Soft delete
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully!');
    }
}
