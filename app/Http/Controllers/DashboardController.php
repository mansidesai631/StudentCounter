<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Assign;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    /**
     * Display all Teacher
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $assigns = Assign::withCount('students')->latest()->paginate(10);
        return view('welcome', compact('assigns'));
    }

    /**
     * Display all Teacher
     * 
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        $exportData = array();
        $data = Assign::withCount('students')->get();
        if(count($data) > 0){                
            $count = 0;
            foreach($data as $ke=>$value)
            {
                $exportData[$count]['Teacher'] = isset($value->teacher_id) ? Teacher::getTeacherNameById($value->teacher_id) : '-';
                $exportData[$count]['Subject'] = isset($value->subject_id) ? Subject::getSubjectNameById($value->subject_id) : '-';
                $exportData[$count]['Total Students Count'] = $value->students_count;
                $exportData[$count]['Status'] = isset($value->status) ? 'Active' : 'InActive';
                $count++;
            }
        }    
    
        return Excel::download(new StudentExport($exportData), 'students.xls');
    }
}
