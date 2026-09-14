<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Department extends Model{
    protected $primaryKey = 'Department_ID';
    protected $fillable = [
        'Department_Name',
    ];
    public function students(){
        return $this->hasMany(Student::class, 'Department_ID', 'Department_ID');
    }
    public function teachers(){
        return $this->hasMany(Teacher::class, 'Department_ID', 'Department_ID');
    }
    public function chairman(){
        return $this->hasOne(Chairman::class, 'Department_ID', 'Department_ID');
    }
}