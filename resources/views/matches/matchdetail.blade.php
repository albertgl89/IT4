@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Team;
use App\Models\MatchResult;
use App\Models\Match;
@endphp

@section('page-title', 'Detall del partit')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-lg grid grid-flow-row shadow border-2 pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <div class="p-2 rounded-t-lg bg-indigo-900 text-white w-full grid grid-flow-col gap-1 justify-end items-center">
                    <a href="{{url('matches')}}" class="gold-pill-btn m-2 w-fit align-middle justify-self-start"><span class="material-icons text-xl align-middle">
                        arrow_back
                        </span>Partits</a>
                        @if ($match->match_result_id != null)
                        <a href="{{url('results/'.$match->match_result_id.'/edit')}}" class="gold-pill-btn w-fit m-2 align-middle"><span class="material-icons text-xl align-middle px-2 mr-1">
                            edit
                            </span>Edita el resultat</a>
                            <a href="{{url('results/'.$match->match_result_id.'/delete')}}" class="red-pill-btn w-fit m-2 align-middle"><span class="material-icons text-xl align-middle px-2 mr-1">
                                delete
                                </span>Esborra el resultat</a>
                        @else
                        <a href="{{url('results/add/'.$match->id)}}" class="gold-pill-btn w-fit m-2 align-middle"><span class="material-icons text-xl align-middle px-2 mr-1">
                            add_circle
                            </span>Afegeix resultat</a>
                        @endif
                        
                        </div>
            </div>

            <div class="grid grid-flow-row gap-1 justify-items-center text-left items-center p-2">

                <p>Partit del {{$match->match_date}}</p>
                <p>Disputat a {{$match->location()->withTrashed()->first()->stadium_name}} ({{$match->location()->withTrashed()->first()->city}}, {{$match->location()->withTrashed()->first()->state}})</p>
                <p>entre {{$match->team1()->withTrashed()->first()->name}} i {{$match->team2()->withTrashed()->first()->name}}</p>
                
                @if ($match->match_result_id == null)
                            <p class="justify-self-center">Pendent del resultat</p>
                        @elseif ($match->results()->withTrashed()->first()->tie == true)
                        <p>Marcador:</p>
                            <ul>
                                <li>{{$match->team1()->withTrashed()->first()->name}}: {{$match->results()->withTrashed()->first()->goals_team1}}</li>
                                <li>{{$match->team2()->withTrashed()->first()->name}}: {{$match->results()->withTrashed()->first()->goals_team2}}</li>
                            </ul>
                            <p class=" justify-self-center">Guanyador: empat</p>
                        @else 
                            <ul>
                                <li>{{$match->team1()->withTrashed()->first()->name}}: {{$match->results()->withTrashed()->first()->goals_team1}}</li>
                                <li>{{$match->team2()->withTrashed()->first()->name}}: {{$match->results()->withTrashed()->first()->goals_team2}}</li>
                            </ul>
                            <p class=" justify-self-center">Guanyador: {{$match->results()->withTrashed()->first()->winningTeam()->withTrashed()->first()->name}}</p>
                        @endif
                
            </div>
      

        </div>

    </div>
@endsection
