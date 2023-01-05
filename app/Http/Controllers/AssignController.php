<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Assign;
use App\Http\Requests\StoreAssignRequest;
use App\Http\Requests\UpdateAssignRequest;


class AssignController extends Controller
{
    /**
     * Display all Teacher
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $assigns = Assign::latest()->paginate(10);
        return view('assigns.index', compact('assigns'));
    }

    /**
     * Show form for creating Assign
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $getSubject = Subject::get();
        $getStudent = Student::get();
        $getTeacher = Teacher::get();
        return view('assigns.create', compact('getSubject', 'getStudent', 'getTeacher'));
    }

    /**
     * Store a newly created Assign
     * 
     * @param StoreAssignRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignRequest $request) 
    {
        $exit = Assign::Where('teacher_id', $request->teacher_id)->Where('subject_id', $request->subject_id)->first();
        if($exit != null)
        {
            return redirect()->route('assigns.create')
            ->withSuccess(__('Duplicate Not Allowed.'));
        }
        
        $input = $request->all();
        $assign = Assign::create($input);
        $assign->students()->sync($request->students);

        return redirect()->route('assigns.index')
            ->withSuccess(__('Added successfully.'));
    }

    /**
     * Show assign data
     * 
     * @param Assign $assign
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Assign $assign) 
    {
        return view('assigns.show', [
            'assign' => $assign
        ]);
    }

    /**
     * Edit assign data
     * 
     * @param Assign $assign
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Assign $assign) 
    {
        $getSubject = Subject::get();
        $getStudent = Student::get();
        $getTeacher = Teacher::get();
        return view('assigns.edit', [
            'getTeacher' => $getTeacher,
            'getStudent' => $getStudent,
            'getSubject' => $getSubject,
            'assign' => $assign
        ]);
    }

    /**
     * Update assign data
     * 
     * @param Assign $assign
     * @param UpdateAssignRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Assign $assign, UpdateAssignRequest $request) 
    {
        $exit = Assign::Where('teacher_id', $request->teacher_id)
        ->Where('subject_id', $request->subject_id)->where('id', $assign->id)->get();
        if(!$exit)
        {
            $input = $request->all();
            $assign->update($input);
        }       
        $assign->students()->sync($request->students);

        return redirect()->route('assigns.index')
            ->withSuccess(__('Updated successfully.'));
    }

    /**
     * Delete assign data
     * 
     * @param Assign $assign
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assign $assign) 
    {
        $assign->delete();
        return redirect()->route('assigns.index')
            ->withSuccess(__('Deleted successfully.'));
    }
}
