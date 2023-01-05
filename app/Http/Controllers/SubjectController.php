<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $subjects = Subject::latest()->paginate(10);
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created user
     * 
     * @param Subject $subject
     * @param StoreSubjectRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request) 
    {
        $input = $request->all();
        Subject::create($input);
        return redirect()->route('subjects.index')
            ->withSuccess(__('Subject created successfully.'));
    }

    /**
     * Show user data
     * 
     * @param Subject $subject
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject) 
    {
        return view('subjects.show', [
            'subject' => $subject
        ]);
    }

    /**
     * Edit user data
     * 
     * @param Subject $subject
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject) 
    {
        return view('subjects.edit', [
            'subject' => $subject
        ]);
    }

    /**
     * Update user data
     * 
     * @param Subject $subject
     * @param UpdateSubjectRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Subject $subject, UpdateSubjectRequest $request) 
    {
        $input = $request->all();
        $subject->update($input);

        return redirect()->route('subjects.index')
            ->withSuccess(__('Subject updated successfully.'));
    }

    /**
     * Delete user data
     * 
     * @param Subject $subject
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject) 
    {
        $subject->delete();
        return redirect()->route('subjects.index')
            ->withSuccess(__('Subject deleted successfully.'));
    }
}
