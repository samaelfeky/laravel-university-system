<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phone';

    public $incrementing = false;

    protected $fillable = [
        'University_ID',
        'Phone_Number',
    ];

    public function student()
    {
        return $this->belongsTo(
            Student::class,
            'University_ID',
            'University_ID'
        );
    }
}