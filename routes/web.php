<?php

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
Route::get('/teams', function () {
    return view('teams');
});

//List all matches
Route::get('/matches', function () {
    return view('matches');
});

//Show summary/details of a particular team
Route::get('/teams/{id}', function () {
    return view('');
});
