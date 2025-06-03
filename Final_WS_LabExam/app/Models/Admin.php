<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins'; // this tells Laravel to use the 'admins' table

    protected $fillable = [
        'username',
        'password',
        'aid',
    ];

    protected $hidden = [
        'password',
    ];
}
