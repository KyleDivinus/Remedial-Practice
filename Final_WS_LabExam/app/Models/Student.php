<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'username', 'password',
        'course_id', 'date_of_birth', 'gender', 'aid', 'date_enrolled'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function accessType()
    {
        return $this->belongsTo(AccessType::class, 'aid');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'sid');
    }
}

