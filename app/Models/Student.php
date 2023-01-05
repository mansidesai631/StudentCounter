<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';

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
        return $this->belongsToMany(Subject::class, 'student_subject_mapping', 'student_id', 'subject_id');
    }
}
