<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subject';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_id', 'subject_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_id', 'subject_id');
    }

    public static function getSubjectNameById($subjectId)
    {
        $subjectName = Subject::where('id',$subjectId)->value('name');
        return ($subjectName) ? $subjectName : '-';
    }
}
