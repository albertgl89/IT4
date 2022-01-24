<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Team;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('locations');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team = null)
    {
        if ($team != null){
            return view('addlocation', ['team' => $team]);
        }
        return view('addlocation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {
        $location = new Location;
        $location->city = $request->city;
        $location->state = $request->state;
        $location->stadium_name = $request->stadium_name;
        $location->save();
        //If this is for a team, assign it now
        if($request->team != null){
            $locationId = Location::all()->last()->id;
            $team = Team::find($request->team);
            $team->city = $locationId;
            $team->save();
            $dbTeam = Team::where('name', $team->name)->first();
            if($team->city == null){
                return redirect()->action([LocationController::class, 'create'],['team' => $dbTeam]);
            }
        }
        if(!isset($request->team)){
            return redirect('locations')->with('status', `La localització $location->city ($location->stadium_name) ha estat donat d'alta correctament.`);//TODO confirmation message
        } else {
            return redirect('teams')->with('status', `La localització $location->city ($location->stadium_name) ha estat donat d'alta correctament per a l'equip $team->name ($team->short_name).`);//TODO confirmation message
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocationRequest  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
