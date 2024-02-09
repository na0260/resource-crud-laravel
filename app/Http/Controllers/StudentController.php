<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Models\Student;
use App\Http\Resources\Student as StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = StudentResource::collection(Student::all());
        return view('index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudent $request)
    {
        $validated = $request->validated();
        Student::create($validated);
        return redirect('/')->with('status','Student created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudent $request, Student $student)
    {
        $validated = $request->validated();
        $student->update($validated);
        return redirect('/')->with('status','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/')->with('status','Student deleted successfully');
    }
}
