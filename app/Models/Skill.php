<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use Translatable;

    public $translatedAttributes = ['libelle'];
    protected $fillable = ['percentage', 'color_hexa', 'libelle'];
    protected $appends = ['type'];
    protected $hidden = ['skill_type_id', 'created_at', 'updated_at'];

    public function getTypeAttribute() {
        return SkillType::find($this->skill_type_id);
    }
}
