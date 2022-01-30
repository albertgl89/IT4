<?php

use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MatchResultController;
use Illuminate\Support\Facades\Route;

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
Route::get('locations/add/{team?}', [LocationController::class, 'create']);

//Submit new location
Route::post('locations/add/{team?}',[LocationController::class, 'store']);

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
    return view('results.selectmatch');
});

//New result form
Route::get('results/add/', [MatchResultController::class, 'create']);

//New result form from match detail
Route::get('results/add/{match}', [MatchResultController::class, 'createFromDetail']);

//Submit result form
Route::post('results/add', [MatchResultController::class, 'store']);

//Show summary/details of a particular team
Route::get('teams/{team}', [TeamController::class, 'show']);

//Show summary/details of a particular location
Route::get('locations/{location}', [LocationController::class, 'show']);

//Show summary/details of a particular match
Route::get('matches/{match}', [MatchController::class, 'show']);

//Edit team form
Route::get('teams/{team}/edit', [TeamController::class, 'edit']);

//Update team 
Route::put('teams/{team}/edit', [TeamController::class, 'update']);

//Edit match form
Route::get('matches/{match}/edit', [MatchController::class, 'edit']);

//Update Match 
Route::put('matches/{match}/edit', [MatchController::class, 'update']);

//Edit location form
Route::get('locations/{location}/edit', [LocationController::class, 'edit']);

//Update location 
Route::put('locations/{location}/edit', [LocationController::class, 'update']);

//Edit results form
Route::get('results/{matchResult}/edit', [MatchResultController::class, 'edit']);

//Update results 
Route::put('results/{matchResult}/edit', [MatchResultController::class, 'update']);

//Soft delete team confirmation page
Route::get('teams/{team}/delete', [TeamController::class, 'confirmSoftDeletion']);

//Soft delete team
Route::delete('teams/{team}/delete', [TeamController::class, 'destroy']);

//Soft delete match confirmation page
Route::get('matches/{match}/delete', [MatchController::class, 'confirmSoftDeletion']);

//Soft delete match
Route::delete('matches/{match}/delete', [MatchController::class, 'destroy']);

//Soft delete location confirmation page
Route::get('locations/{location}/delete', [LocationController::class, 'confirmSoftDeletion']);

//Soft delete location
Route::delete('locations/{location}/delete', [LocationController::class, 'destroy']);

//Soft delete result confirmation page
Route::get('results/{matchResult}/delete', [MatchResultController::class, 'confirmSoftDeletion']);

//Soft delete result
Route::delete('results/{matchResult}/delete', [MatchResultController::class, 'destroy']);

//List all stadiums within same city
Route::get('cities/{location}', [LocationController::class, 'filterCity']);

//List all stadiums within same state
Route::get('states/{location}', [LocationController::class, 'filterState']);

