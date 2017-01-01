<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['locale', 'name'];
    protected $hidden = ['created_at', 'updated_at'];
}
