@extends('layouts.base')

@php
use App\Models\Match;
use App\Models\Team;
use App\Models\Location;
@endphp

@section('page-title', 'Editar partit')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full">Modifica els camps necessaris</p>
            </div>

            @if ($errors->any())
                <div class="rounded-xl bg-red-800 text-white p-2 w-3/4 mx-auto">
                    <p>Atenció! S'han trobat els errors següents:</p>
                    <ul class="bg-white/50 text-black rounded-lg shadow p-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{url('matches/'.$match->id.'/edit')}}" method="post" class="std-form">
                @csrf
                @method('put')
                <label for="match_date" class="std-form-label">Data i hora del partit</label>
                <input type="datetime-local" name="match_date" id=""
                    class="std-form-text-input" value="{{ $match->match_date }}">

                <label for="location_id" class="std-form-label">Localització del partit</label>
               
                    <select name="location_id" id=""
                        class="std-form-selector">
                        
                            @foreach (Location::all() as $location)
                                <option value="{{ $location->id }}" class="text-indigo-600" @if ($match->location_id == $location->id) selected @endif>
                                    {{ $location->stadium_name . ' (' . $location->city . ', ' . $location->state . ')' }}</option>
                            @endforeach
                    
                    </select>
                

                <label for="team1" class="std-form-label">1r equip</label>
                @if (Team::all()->count() <= 1)
                        <p>No hi ha cap equip encara, o suficients contrincants.</p>
                        @php $missingFields = true; @endphp
                @else
                    <select name="team1" id=""
                        class="std-form-selector">
                        @foreach (Team::all() as $team)
                            <option value="{{ $team->id }}" class="text-indigo-600" @if ($match->team1 == $team->id) selected @endif>
                                {{ $team->name . ' (' . $team->short_name . ')' }}</option>
                        @endforeach
                    </select>
                @endif

                <label for="team2" class="std-form-label">2n equip</label>
                @if (Team::all()->count() <= 1)
                        <p>No hi ha cap equip encara, o suficients contrincants.</p>
                        @php $missingFields = true; @endphp
                @else
                    <select name="team2" id=""
                        class="std-form-selector">
                        @foreach (Team::all() as $team)
                            <option value="{{ $team->id }}" class="text-indigo-600" @if ($match->team2 == $team->id) selected @endif>
                                {{ $team->name . ' (' . $team->short_name . ')' }}</option>
                        @endforeach
                    </select>
                @endif

            

                <input type="submit" value="Actualitza les dades" class=" w-full mt-4  green-pill-btn">
            </form>

        </div>

    </div>
@endsection
