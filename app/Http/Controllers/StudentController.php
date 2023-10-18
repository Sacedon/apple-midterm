<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\UserLog;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'year_level' => 'required|integer',
            'age' => 'required|integer',
        ]);

        $student = Student::create($request->all());
        $log_entry = Auth::user()->name . " added a student ". $student->name . " with the id# ". $student->id;
        event(new UserLog($log_entry));
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
{
    $request->validate([
        'name' => 'required',
        'year_level' => 'required|integer',
        'age' => 'required|integer',
    ]);

    $data = $request->only(['name', 'year_level', 'age']);
    $student->update($data);

    $log_entry = Auth::user()->name . " updated a student " . $student->title . " with the id# " . $student->id;
    event(new UserLog($log_entry));

    return redirect()->route('students.index')
        ->with('success', 'student updated successfully');
}


    public function destroy(Student $student)
    {
        $student->delete();
        $log_entry = Auth::user()->name . " deleted an student ". $student->name . " with the id# ". $student->id;
        event(new UserLog($log_entry));

        return redirect()->route('students.index')
            ->with('success', 'student deleted successfully');
    }
}
