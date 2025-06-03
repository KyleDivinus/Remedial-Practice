<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessType extends Model
{
    protected $primaryKey = 'aid';

    protected $fillable = ['access_type'];

    public $timestamps = true;
}

