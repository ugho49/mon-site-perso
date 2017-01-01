<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Support\Facades\Response;

class TimelineController extends Controller
{
    public function index() {
        $timelines = Timeline::orderBy('start', 'DESC')->get();
        return Response::json($timelines, 200);
    }

    public function show($locale, $id) {
        $timeline = Timeline::find($id);
        return Response::json($timeline, 200);
    }
}
