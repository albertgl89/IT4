<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\MatchResult;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('view data')) {
            return view('matches.matches');
        }
        return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        return view('matches.addmatch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMatchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatchRequest $request)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        $match = new Match;
        $match->match_date = $request->match_date;
        $match->location_id = $request->location_id;
        $match->team1 = $request->team1;
        $match->team2 = $request->team2;
        $match->save();
        return redirect('matches')->with('status', "El partit ha estat donat d'alta correctament.");//TODO confirmation message
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        if (auth()->user()->can('view data')) {
            return view('matches.matchdetail', ['match' => $match]);
        }
        return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        return view('matches.editmatch', ['match' => $match]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatchRequest  $request
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatchRequest $request, Match $match)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        $match->match_date = $request->match_date;
        $match->location_id = $request->location_id;
        $match->team1 = $request->team1;
        $match->team2 = $request->team2;
        //If the date a match is to be celebrated is moved forward, but a result had already been registered, erase it
        if($match->match_result_id != null && $match->match_date > now()){
            $match->match_result_id = null;
        }
        $match->save();
        return redirect('matches')->with('status', "El partit ha estat modificat correctament.");//TODO confirmation message
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        if($match->match_result_id != null){
            MatchResult::find($match->match_result_id)->delete();//Soft delete its result too
        }
        $match->delete();
        return redirect('matches')->with('status', "El partit ha estat eliminat correctament.");//TODO confirmation message
    }

    /**
     * Show confirmation page before deletion.
     *
     * @param  \App\Models\Match  $team
     * @return \Illuminate\Http\Response
     */
    public function confirmSoftDeletion(Match $match)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        return view('matches.confirmdeletion', ['match' => $match]);
    }
}
