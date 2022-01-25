@extends('layouts.base')

@php
use App\Models\Match;
use App\Models\Team;
use App\Models\Location;
use App\Models\MatchResult;
$prevResult = MatchResult::find($match->match_result_id);
@endphp

@section('page-title', 'Editar un resultat')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-lg grid grid-flow-row shadow border-2 pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">Modifica el número de gols necessaris</p>
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

            <form action="{{url('results/'.$prevResult->id.'/edit')}}" method="post" class="std-form">
                @csrf
                @method('put')
                <div class="rounded-xl bg-yellow-500 text-indigo-900 p-2 mb-2 w-full mx-auto text-center">
                    Partit celebrat en <b>{{$match->match_date}}</b><br> a <b>{{Location::find($match->location_id)->stadium_name}}</b> entre <br>
                    <b>{{Team::find($match->team1)->name}}</b> i <b>{{ Team::find($match->team2)->name }}</b>
                </div>
                <div class="grid grid-flow-col gap-2">
                    <input type="hidden" name="match" value="{{$match->id}}">
                    <div class="border rounded-xl shadow p-2 text-center text-xl font-bold grid grid-flow-row gap-2">
                        {{ Team::find($match->team1)->short_name }}
                        <input type="hidden" name="team1" value="{{$match->team1}}">
                        <input type="number" name="goals_team1" id="" class="std-form-number-input" value="{{$prevResult->goals_team1}}">
                    </div>
                    <div class="border rounded-xl shadow p-2 text-center text-xl font-bold grid grid-flow-row gap-2">
                        {{ Team::find($match->team2)->short_name }}
                        <input type="hidden" name="team2" value="{{$match->team2}}">
                        <input type="number" name="goals_team2" id="" class="std-form-number-input" value="{{$prevResult->goals_team2}}">
                    </div>
                </div>
            

                <input type="submit" value="Actualitza el nou resultat" class=" w-full mt-4 green-pill-btn">
            </form>

        </div>

    </div>
@endsection
