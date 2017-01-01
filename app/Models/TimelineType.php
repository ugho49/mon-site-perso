<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineType extends Model
{
    protected $fillable = ['type', 'background_class', 'ico_class'];
    protected $hidden = ['created_at', 'updated_at'];
}
