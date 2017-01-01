<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Support\Facades\Response;

class InformationController extends Controller
{
    const recaptcha_secret = 'recaptcha_secret';

    public function index() {
        $infos = Information::where('key', '<>', self::recaptcha_secret)->get();
        return Response::json($infos, 200);
    }

    public function show($locale, $key) {
        if ($key === self::recaptcha_secret) {
            return Response::json(['error' => true, 'message' => "You're not authorized to get this information"], 403);
        }

        $info = Information::where('key', $key)->first();
        return Response::json($info, 200);
    }
}
