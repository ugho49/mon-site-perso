<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['value_locale'];
}
