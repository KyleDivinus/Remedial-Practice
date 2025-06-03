<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    // Match the column name in your migration
    protected $fillable = ['course_name'];

    // Use default timestamps as per migration (created_at, updated_at)
    public $timestamps = true;
}
