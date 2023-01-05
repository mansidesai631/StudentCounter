<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display all student
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show form for creating student
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $getSubject = Subject::get();
        return view('students.create', compact('getSubject'));
    }

    /**
     * Store a newly created student
     * 
     * @param Student $student
     * @param StoreStudentRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Student $student, StoreStudentRequest $request) 
    {
        $input = $request->all();
        $student = Student::create($input);
        $student->subjects()->sync($request->subjects);

        return redirect()->route('students.index')
            ->withSuccess(__('Student created successfully.'));
    }

    /**
     * Show student data
     * 
     * @param Student $student
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student) 
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    /**
     * Edit student data
     * 
     * @param Student $student
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student) 
    {
        $getSubject = Subject::get();
        return view('students.edit', [
            'student' => $student,
            'getSubject' => $getSubject
        ]);
    }

    /**
     * Update student data
     * 
     * @param Student $student
     * @param UpdateStudentRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student, UpdateStudentRequest $request) 
    {
        $input = $request->all();
        $student->update($input);
        $student->subjects()->sync($request->subjects);

        return redirect()->route('students.index')
            ->withSuccess(__('Student updated successfully.'));
    }

    /**
     * Delete student data
     * 
     * @param Student $student
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student) 
    {
        $student->delete();
        return redirect()->route('students.index')
            ->withSuccess(__('Student deleted successfully.'));
    }
}
