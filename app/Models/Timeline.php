<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'subtitle', 'description'];
    protected $fillable = ['start', 'end', 'type', 'title', 'subtitle', 'description'];
    protected $appends = ['type'];
    protected $hidden = ['timeline_type_id', 'created_at', 'updated_at'];

    public function getTypeAttribute() {
        return TimelineType::find($this->timeline_type_id);
    }
}
