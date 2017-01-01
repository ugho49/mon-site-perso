<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'description', 'action'];
    protected $fillable = ['url', 'imagePath', 'enabled', 'title', 'description', 'action'];
    protected $hidden = ['created_at', 'updated_at'];
}
