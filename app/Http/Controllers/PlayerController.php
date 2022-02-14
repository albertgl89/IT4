<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use Illuminate\Http\Request;
use App\Models\Team;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        if (auth()->user()->can('view data')) {
            return view('players.team', ['team' => $team]);
        }
        return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
    }

    /**
     * Show the form for creating a new resource.
     *@param App\Models\Team
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team)
    {
        if (auth()->user()->can('manage data')) {
            return view('players.addplayer', ['team'=>$team]);
        }
        return redirect('/dashboard')->with('unauth', 'Sense permisos suficients.');
    }

    /**
     * Store a newly created resource in storage.
     *@param App\Models\Team
     * @param  \App\Http\Requests\StorePlayerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request, Team $team)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        $player = new Player;
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->team_id = $team->id;
        $player->save();
        return redirect('players/'.$team->id)->with('status', "El jugador $player->name $player->surname ha estat afegit a l'equip $team->name."); //TODO confirmation message
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        return view('players.editplayer', ['player' => $player]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlayerRequest  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->team_id = $request->team_id;
        $player->save();

        return redirect('players/'.$player->team_id)->with('status', "Les dades del jugador $player->name $player->surname s'han actualitzat correctament."); //TODO confirmation message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        $team = $player->team_id;
        $player->delete();
        return redirect('players/'.$team)->with('status', "El jugador ha estat eliminat correctament."); //TODO confirmation message
    }

    /**
     * Show confirmation page before deletion.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function confirmSoftDeletion(Player $player)
    {
        if (!auth()->user()->can('manage data')) {
            return redirect('/dashboard')->with('unauth', "Sense permisos suficients.");
        }
        return view('players.confirmdeletion', ['player' => $player]);
    }
}
