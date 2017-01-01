<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return Response::json($projects, 200);
    }

    public function show($locale, $id) {
        $project = Project::find($id);
        return Response::json($project, 200);
    }
}
