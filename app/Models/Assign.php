<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;

    protected $table = 'assign_student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subject_id',
        'teacher_id'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'assign_student_student_mapping', 'assign_student_id', 'student_id');
    }
}
