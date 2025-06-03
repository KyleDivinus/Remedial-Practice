<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback'; // add if not following Laravel naming

    protected $fillable = [
        'sid', 'iid', 'feedback', 'status', 'semester', 'year', 'date_created'
    ];

    public $timestamps = false;

    protected $casts = [
        'date_created' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'sid');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'iid');
    }
}


