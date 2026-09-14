<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Student extends Model{
    protected $primaryKey = 'University_ID';
    public $incrementing = false;
    protected $keyType = 'string'; 
    protected $fillable = [
        'University_ID',
        'name',
        'street',
        'city',
        'zip',
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
        return $this->belongsToMany(Course::class, 'takes', 'University_ID', 'Course_ID');
    }
}