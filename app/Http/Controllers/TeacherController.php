<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;


class TeacherController extends Controller
{
    /**
     * Display all Teacher
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show form for creating Teacher
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $getSubject = Subject::get();
        return view('teachers.create', compact('getSubject'));
    }

    /**
     * Store a newly created Teacher
     * 
     * @param Teacher $teacher
     * @param StoreTeacherRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Teacher $teacher, StoreTeacherRequest $request) 
    {
        $input = $request->all();
        $teacher = Teacher::create($input);
        $teacher->subjects()->sync($request->subjects);

        return redirect()->route('teachers.index')
            ->withSuccess(__('Teacher created successfully.'));
    }

    /**
     * Show Teacher data
     * 
     * @param Teacher $teacher
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher) 
    {
        return view('teachers.show', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Edit teacher data
     * 
     * @param Teacher $teacher
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher) 
    {
        $getSubject = Subject::get();
        return view('teachers.edit', [
            'teacher' => $teacher,
            'getSubject' => $getSubject
        ]);
    }

    /**
     * Update teacher data
     * 
     * @param Teacher $teacher
     * @param UpdateTeacherRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Teacher $teacher, UpdateTeacherRequest $request) 
    {
        $input = $request->all();
        $teacher->update($input);
        $teacher->subjects()->sync($request->subjects);

        return redirect()->route('teachers.index')
            ->withSuccess(__('Teacher updated successfully.'));
    }

    /**
     * Delete teacher data
     * 
     * @param Teacher $teacher
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher) 
    {
        $teacher->delete();
        return redirect()->route('teachers.index')
            ->withSuccess(__('Teacher deleted successfully.'));
    }
}
