<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //define model
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'civility',
        'school_id',
        'status',
        'date_of_birth'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
