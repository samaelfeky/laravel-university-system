<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $primaryKey = 'Teacher_ID';

    public $incrementing = false;

    protected $fillable = [
        'Teacher_ID',
        'name',
        'Department_ID',
        'user_id',
    ];

    public function department()
    {
        return $this->belongsTo(
            Department::class,
            'Department_ID',
            'Department_ID'
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'teaches',
            'Teacher_ID',
            'Course_ID'
        )->withTimestamps();
    }
}
