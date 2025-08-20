<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $fillable = [
        'legal_name',
        'commercial_name',
        'education_level',
        'mobile_phone',
        'email',
        'address'
    ];
    public function student()
    {
        return $this->hasMany(Student::class, 'school_id', 'id');
    }
}
