<?php
/**
 * Created by PhpStorm.
 * User: ughostephan
 * Date: 08/01/2017
 * Time: 00:12
 */

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index() {
        return view('pages.index', []);
    }
}