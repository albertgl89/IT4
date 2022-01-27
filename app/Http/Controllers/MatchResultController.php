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
        //If we try to access the form without selecting a match first, show the match selection view
        if (!isset($request->match_id)){
            return redirect(url('results/selectmatch'));
        }

        $matchId = $request->match_id;
        $match = Match::find($matchId);
        //If we try to add a result via url to a match in the future or a match with a result already, redirect
        if($match->match_date > now() || $match->match_result_id != null){
            return redirect('/')->with('status', `Aquesta acció està prohibida.`);//TODO confirmation message
        }
        return view('results.addresult', ['match' => $match]);
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
        return redirect('matches')->with('status', `Els resultats s'han desat correctament.`);//TODO confirmation message
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
        $match = Match::firstWhere('match_result_id', $matchResult->id);
        return view('results.editresult',['matchResult' => $matchResult, 'match' => $match]);
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
        $matchResult->goals_team1 = $request->goals_team1;
        $matchResult->goals_team2 = $request->goals_team2;
        if($matchResult->goals_team1 == $matchResult->goals_team2){
            $matchResult->tie = true;
        } else if ($matchResult->goals_team1 > $matchResult->goals_team2){
            $matchResult->tie = false;
            $matchResult->winning_team = $request->team1;
        } else {
            $matchResult->tie = false;
            $matchResult->winning_team = $request->team2;
        }
        $matchResult->save();
        return redirect('/')->with('status', `Els resultats s'han actualitzat correctament.`);//TODO confirmation message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatchResult  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchResult $matchResult)
    {
        $matchId = $matchResult->match()->first()->id;
        //Set the result to null on the match where it was registered
        $match = Match::find($matchId);
        $match->match_result_id = null;
        $match->save();
        //Delete the result
        $matchResult->delete();
        return redirect('matches/'.$matchId)->with('status', `Resultat eliminat correctament.`);//TODO confirmation message
    }

    /**
     * Show confirmation page before deletion.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function confirmSoftDeletion(MatchResult $matchResult)
    {
        return view('results.confirmdeletion', ['matchResult' => $matchResult]);
    }
}
