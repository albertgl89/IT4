<?php

namespace App\Http\Controllers;

use App\Models\MatchResult;
use App\Models\Match;
use App\Http\Requests\StoreMatchResultRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMatchResultRequest;

class MatchResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $match = Match::find($request->query('match_id'));
        return view('addresult', ['match' => $match]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMatchResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatchResultRequest $request)
    {        
        $result = new MatchResult;
        $result->goals_team1 = $request->goals_team1;
        $result->goals_team2 = $request->goals_team2;
        if($result->goals_team1 == $result->goals_team2){
            $result->tie = true;
        } else if ($result->goals_team1 > $result->goals_team2){
            $result->tie = false;
            $result->winning_team = $request->team1;
        } else {
            $result->tie = false;
            $result->winning_team = $request->team2;
        }
        $result->save();
        //Assign this result to the match
        $match = Match::find($request->match);
        $match->match_result_id = MatchResult::all()->last()->id;
        $match->save();
        return redirect('/')->with('status', `Els resultats s'han desat correctament.`);//TODO confirmation message
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function show(MatchResult $matchResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function edit(MatchResult $matchResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatchResultRequest  $request
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatchResultRequest $request, MatchResult $matchResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchResult $matchResult)
    {
        //
    }
}
