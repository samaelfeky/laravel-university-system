<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $primaryKey = 'Department_ID';

    public $incrementing = false;

    protected $fillable = [
        'Department_ID',
        'Department_Name',
    ];

    public function students()
    {
        return $this->hasMany(
            Student::class,
            'Department_ID',
            'Department_ID'
        );
    }

    public function teachers()
    {
        return $this->hasMany(
            Teacher::class,
            'Department_ID',
            'Department_ID'
        );
    }

    public function courses()
    {
        return $this->hasMany(
            Course::class,
            'Department_ID',
            'Department_ID'
        );
    }

    public function chairman()
    {
        return $this->hasOne(
            Chairman::class,
            'Department_ID',
            'Department_ID'
        );
    }
}