<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use Translatable;

    protected $table = 'informations';
    public $translatedAttributes = ['value_locale'];
    protected $fillable = ['key', 'value', 'value_locale'];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
