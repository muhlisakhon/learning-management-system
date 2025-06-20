<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class StudentSubjectController extends Controller
{
    public function mySubjects()
    {
        $user = Auth::user();
        $subjects = $user->subjects; 

        return view('student.subjects.my', compact('subjects'));
    }

    public function availableSubjects()
    {
        $user = Auth::user();
        $subjects = Subject::whereDoesntHave('students', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->with('teacher')
            ->get();

        return view('student.subjects.available', compact('subjects'));
    }
    public function takeSubject(Subject $subject)
    {
        $user = Auth::user();
        $user->subjects()->attach($subject->id);

        return redirect()->route('student.subjects.my')->with('success', 'Subject taken successfully!');
    }

    public function leaveSubject(Subject $subject)
    {
        $user = Auth::user();

      
        $user->subjects()->detach($subject->id);

        return redirect()->route('student.subjects.my')->with('success', 'You have left the subject successfully.');
    }

    public function show(Subject $subject)
    {
        $subject->load('students', 'teacher'); 
        return view('student.subjects.show', compact('subject'));
    }


}
