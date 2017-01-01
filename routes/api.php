<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/

Route::get('translations', 'Api\TranslationController@index');

Route::group(['prefix' => '{locale}', 'middleware' => 'locale'], function() {
    Route::resource('projects', 'Api\ProjectController');
    Route::resource('informations', 'Api\InformationController');
    Route::resource('skills', 'Api\SkillController');
    Route::resource('type-skills', 'Api\TypeSkillController');
    Route::resource('timelines', 'Api\TimelineController');
    Route::resource('type-timelines', 'Api\TypeTimelineController');

    Route::post('contact', [
        'as' => 'contact', 'uses' => 'Api\ContactController@sendMessage'
    ]);
});


