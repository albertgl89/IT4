<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Controllers\LocationController;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('view data')) {
            return view('teams.teams');
        }
        return redirect('/dashboard')->with('status', `Sense permisos suficients.`);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('manage data')) {
            return view('teams.addteam');
        }
        return redirect('/dashboard')->with('status', `Sense permisos suficients.`);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('status', `Sense permisos suficients.`);
        }
        $team = new Team;
        $team->name = $request->name;
        $team->short_name = $request->short_name;
        if ($request->city === "null") {
            $team->city = null;
        } else {
            $team->city = $request->city;
        }
        $team->save();
        $dbTeam = Team::all()->last();
        if ($team->city == null) {
            return redirect()->action([LocationController::class, 'create'], ['team' => $dbTeam]);
        }
        return redirect('teams')->with('status', `L'equip $team->name ha estat donat d'alta correctament.`); //TODO confirmation message
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.teamdetail', ['team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('status', `Sense permisos suficients.`);
        }
        return view('teams.editteam', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamRequest  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('status', `Sense permisos suficients.`);
        }
        $team->name = $request->name;
        $team->short_name = $request->short_name;
        if ($request->city === "null") {
            $team->city = null;
        } else {
            $team->city = $request->city;
        }
        $team->save();

        if ($team->city == null) {
            return redirect()->action([LocationController::class, 'create'], ['team' => $team]);
        }

        return redirect('teams')->with('status', `L'equip $team->name ha estat actualitzat correctament.`); //TODO confirmation message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('status', `Sense permisos suficients.`);
        }
        $team->delete();
        return redirect('teams')->with('status', `L'equip $team->name ha estat eliminat correctament.`); //TODO confirmation message
    }

    /**
     * Show confirmation page before deletion.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function confirmSoftDeletion(Team $team)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('status', `Sense permisos suficients.`);
        }
        return view('teams.confirmdeletion', ['team' => $team]);
    }
}
