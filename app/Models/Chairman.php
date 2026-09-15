<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chairman extends Model
{
    protected $table = 'chairman';

    protected $primaryKey = 'Chairman_ID';

    protected $fillable = [
        'Department_ID',
    ];

    public function department()
    {
        return $this->belongsTo(
            Department::class,
            'Department_ID',
            'Department_ID'
        );
    }
}