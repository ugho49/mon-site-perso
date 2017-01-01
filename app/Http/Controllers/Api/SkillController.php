<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Support\Facades\Response;

class SkillController extends Controller
{
    public function index() {
        $skills = Skill::all();
        return Response::json($skills, 200);
    }

    public function show($locale, $id) {
        $skill = Skill::find($id);
        return Response::json($skill, 200);
    }
}
