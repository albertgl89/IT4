<?php

use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MatchResultController;
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

//List all locations
Route::get('locations', [LocationController::class, 'index']);

//New locations form
Route::get('locations/add', [LocationController::class, 'create']);

//Submit new location
Route::post('locations/add',[LocationController::class, 'store']);

//New teams form
Route::get('teams/add', [TeamController::class, 'create']);

//Submit new team
Route::post('teams/add', [TeamController::class, 'store']);

//New match form
Route::get('matches/add', [MatchController::class, 'create']);

//Submit new match
Route::post('matches/add', [MatchController::class, 'store']);

//New result registration process
Route::get('results/selectmatch', function(){
    return view('selectmatch');
});

//New result form
Route::get('results/add/{match}', [MatchResultController::class, 'create']);

//Submit result form
Route::post('results/add', [MatchResultController::class, 'store']);


//Show summary/details of a particular team
Route::get('team/{id}', function (Team $team) {
    return view('teamdetail', ['team' => $team]);
});

//Show summary/details of a particular match
Route::get('match/{id}', function (Match $match) {
    return view('matchdetail', ['match' => $match]);
});

//Edit team form
Route::get('teams/edit/{team}', function (Team $team) {
    return view('teamsadd', ['team' => $team]);
});


//Edit match form
Route::get('matches/edit/{match}', function (Match $match) {
    return view('teamsadd', ['match' => $match]);
});
