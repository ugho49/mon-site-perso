<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TimelineType;
use Illuminate\Support\Facades\Response;

class TypeTimelineController extends Controller
{
    public function index() {
        $timeline_types = TimelineType::all();
        return Response::json($timeline_types, 200);
    }

    public function show($locale, $id) {
        $timeline_type = TimelineType::find($id);
        return Response::json($timeline_type, 200);
    }
}
