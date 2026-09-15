<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'Course_ID';

    protected $fillable = [
        'Course_Name',
        'Course_Fee',
    ];

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'takes',
            'Course_ID',
            'University_ID'
        )
        ->withPivot('Semester')
        ->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(
            Teacher::class,
            'teaches',
            'Course_ID',
            'Teacher_ID'
        )
        ->withTimestamps();
    }
}