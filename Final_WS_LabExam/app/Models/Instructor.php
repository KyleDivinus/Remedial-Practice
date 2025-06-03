<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'cid', 'firstname', 'lastname', 'username', 'password', 'aid'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'cid');
    }

    public function accessType()
    {
        return $this->belongsTo(AccessType::class, 'aid');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'iid');
    }
}

