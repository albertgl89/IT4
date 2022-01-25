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
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">
                    <a href="{{url('matches')}}" class="gold-pill-btn m-2 align-middle"><span class="material-icons text-xl align-middle">
                        arrow_back
                        </span>Torna</a>
                </p>
            </div>

            <div class="grid grid-flow-row gap-1 justify-items-center text-left items-center p-2">

                <p>Partit del {{$match->match_date}}</p>
                <p>Disputat a {{Location::find($match->location_id)->stadium_name}} ({{Location::find($match->location_id)->city}}, {{Location::find($match->location_id)->state}})</p>
                <p>entre {{Team::find($match->team1)->name}} i {{Team::find($match->team2)->name}}</p>
                
                @if ($match->match_result_id == null)
                            <p class="justify-self-center">Pendent del resultat</p>
                        @elseif (MatchResult::find($match->match_result_id)->tie == true)
                        <p>Marcador:</p>
                            <ul>
                                <li>{{Team::find($match->team1)->name}}: {{MatchResult::find($match->match_result_id)->goals_team1}}</li>
                                <li>{{Team::find($match->team2)->name}}: {{MatchResult::find($match->match_result_id)->goals_team2}}</li>
                            </ul>
                            <p class=" justify-self-center">Guanyador: empat</p>
                        @else 
                            <ul>
                                <li>{{Team::find($match->team1)->name}}: {{MatchResult::find($match->match_result_id)->goals_team1}}</li>
                                <li>{{Team::find($match->team2)->name}}: {{MatchResult::find($match->match_result_id)->goals_team2}}</li>
                            </ul>
                            <p class=" justify-self-center">Guanyador: {{Team::find(MatchResult::find($match->match_result_id)->winning_team)->name}}</p>
                        @endif
                
            </div>
      

        </div>

    </div>
@endsection
