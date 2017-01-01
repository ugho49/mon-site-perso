<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SkillType;
use Illuminate\Support\Facades\Response;

class TypeSkillController extends Controller
{
    public function index() {
        $skill_types = SkillType::all();
        return Response::json($skill_types, 200);
    }

    public function show($locale, $id) {
        $skill_type = SkillType::find($id);
        return Response::json($skill_type, 200);
    }
}
