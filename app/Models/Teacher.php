<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'status'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject_mapping', 'teacher_id', 'subject_id');
    }

    public static function getTeacherNameById($teacherId)
    {
        $teacherName = Teacher::where('id',$teacherId)->value('name');
        return ($teacherName) ? $teacherName : '-';
    }
}
