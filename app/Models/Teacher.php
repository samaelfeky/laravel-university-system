<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Teacher extends Model{
    protected $primaryKey = 'Teacher_ID';
    protected $fillable = [
        'name',
        'type',
        'Department_ID',
        'user_id',
    ];
    public function department(){
        return $this->belongsTo(Department::class, 'Department_ID', 'Department_ID');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function courses(){
        return $this->belongsToMany(Course::class, 'teaches', 'Teacher_ID', 'Course_ID');
    }
}