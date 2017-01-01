<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use Illuminate\Support\Facades\Response;

class TranslationController extends Controller
{
    public function index() {
        $locales = Translation::all();
        return Response::json($locales, 200);
    }
}
