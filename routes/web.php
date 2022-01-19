<?php

use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;
use App\Models\Team;
use App\Models\Match;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//List all teams
Route::get('teams', [TeamController::class, 'index']);

//List all matches
Route::get('matches', [MatchController::class, 'index']);

//Show summary/details of a particular team
Route::get('team/{id}', function (Team $team) {
    return view('teamdetail', ['team' => $team]);
});

//Show summary/details of a particular match
Route::get('match/{id}', function (Match $match) {
    return view('matchdetail', ['match' => $match]);
});

//New teams form
Route::get('teams/add', function () {
    return view('teamsadd');
});

//Submit new team
Route::post('teams/add', function (Request $request){
    return view('teamsadd');
});

//Edit team form
Route::get('teams/edit/{team}', function (Team $team) {
    return view('teamsadd', ['team' => $team]);
});

//New match form
Route::get('matches/add', function () {
    return view('teamsadd');
});

//Submit new match
Route::post('matches/add', function (Request $request){
    return view('matchesadd');
});

//Edit match form
Route::get('matches/edit/{match}', function (Match $match) {
    return view('teamsadd', ['match' => $match]);
});
