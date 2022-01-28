<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Team;
use App\Models\Match;
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
        return view('locations.locations');
    }

    /**
     * Show the form for creating a new resource.
     * @param \App\Models\Team $team
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team = null)
    {
        if ($team != null){
            return view('locations.addlocation', ['team' => $team]);
        }
        return view('locations.addlocation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request, Team $team)
    {
        $location = new Location;
        $location->city = $request->city;
        $location->state = $request->state;
        $location->stadium_name = $request->stadium_name;
        $location->save();
        //If this is for a team, assign it now
        if($request->team != null){
            $locationId = Location::all()->last()->id;
            $team->city = $locationId;
            $team->save();
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
       return view('locations.locationdetail', ['location' => $location]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('locations.editlocation', ['location' => $location]);
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
        $location->city = $request->city;
        $location->state = $request->state;
        $location->stadium_name = $request->stadium_name;
        $location->save();
        return redirect('locations')->with('status', `La localització $location->city ($location->stadium_name) ha estat actualitzada correctament.`);//TODO confirmation message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //Dissociate this location from teams and future matches, but not past matches as they have already been celebrated
        foreach (Team::where('city', $location->id)->get() as $team){
            $team->city = null;
            $team->save();
        }
        foreach (Match::where('location_id', $location->id)->where('match_date', '>', now())->get() as $match){
            $match->location_id = null;
            $match->save();
        }

        $location->delete();
        return redirect('locations')->with('status', `La localització $location->stadium_name ha estat eliminada correctament.`);//TODO confirmation message
    }

    /**
     * Show confirmation page before deletion.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function confirmSoftDeletion(Location $location)
    {
        return view('locations.confirmdeletion', ['location' => $location]);
    }
}
