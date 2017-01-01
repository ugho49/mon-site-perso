<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SkillType extends Model
{
    use Translatable;

    public $translatedAttributes = ['libelle'];
    protected $fillable = ['libelle'];
    protected $hidden = ['created_at', 'updated_at'];
}
