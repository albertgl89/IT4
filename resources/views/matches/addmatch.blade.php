@extends('layouts.base')

@php
use App\Models\Match;
use App\Models\Team;
use App\Models\Location;
$missingFields = false;
@endphp

@section('page-title', 'Afegir nou partit')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full"><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                    add_circle
                    </span>Emplena tots els camps amb la informació
                    necessària</p>
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

            <form action="add" method="post" class="std-form">
                @csrf
                <label for="match_date" class="std-form-label">Data i hora del partit</label>
                <input type="datetime-local" name="match_date" id=""
                    class="std-form-text-input" value="{{ old('match_date') }}">

                <label for="location_id" class="std-form-label">Localització del partit</label>
                @if (Location::all()->count() == 0)
                        <p>No hi ha cap localització encara.</p>
                        @php $missingFields = true; @endphp
                @else
                    <select name="location_id" id=""
                        class="std-form-selector" selectedIndex={{ old('location_id') }}>
                        
                            @foreach (Location::all() as $location)
                                <option value="{{ $location->id }}" class="text-indigo-600">
                                    {{ $location->stadium_name . ' (' . $location->city . ', ' . $location->state . ')' }}</option>
                            @endforeach
                    
                    </select>
                @endif

                <label for="team1" class="std-form-label">1r equip</label>
                @if (Team::all()->count() <= 1)
                        <p>No hi ha cap equip encara, o suficients contrincants.</p>
                        @php $missingFields = true; @endphp
                @else
                    <select name="team1" id=""
                        class="std-form-selector">
                        @foreach (Team::all() as $team)
                            <option value="{{ $team->id }}" class="text-indigo-600" @if (old('team2') == $team->id) selected @endif>
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
                            <option value="{{ $team->id }}" class="text-indigo-600" @if (old('team2') == $team->id) selected @endif>
                                {{ $team->name . ' (' . $team->short_name . ')' }}</option>
                        @endforeach
                    </select>
                @endif

            

                <input type="submit" value="Crea el partit" class=" w-full mt-4 @if($missingFields) disabled-btn @else green-pill-btn @endif" @if ($missingFields) disabled @endif>
            </form>

        </div>

    </div>
@endsection
