<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'subtitle', 'description'];
}
