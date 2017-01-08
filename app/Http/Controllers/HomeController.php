<?php
/**
 * Created by PhpStorm.
 * User: ughostephan
 * Date: 08/01/2017
 * Time: 00:12
 */

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\SkillType;
use App\Models\Timeline;
use App\Models\Translation;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {
        $timeline = Timeline::orderBy('start', 'DESC')->get();
        $skills = Skill::all();
        $typeSkills = SkillType::all();
        $projects = Project::all();

        return view('pages.index', [
            'timelines'    => $timeline,
            'typeSkills'   => $typeSkills,
            'skills'       => $skills,
            'projects'     => $projects
        ]);
    }

    public function changeLocale($locale) {
        $localesAvailables = Translation::all('locale');

        if ( $localesAvailables->contains('locale', $locale) ) {
            Session::set('locale', $locale);
        } else {
            Session::set('locale', "fr");
        }

        return Response::json(true, 200);
    }
}