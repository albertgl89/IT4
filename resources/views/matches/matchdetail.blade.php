@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Team;
use App\Models\MatchResult;
use App\Models\Match;
$resultat = false;
if ($match->match_result_id != null){
    $resultat = true;
}
@endphp

@section('page-title', 'Detall del partit')


@section('content')
    <div class="grid grid-flow-row w-full mt-2 font-heebo">

        <div class="w-11/12 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">

             <!--Action buttons-->
             <div class="mb-2 w-full mx-auto">
                <div
                    class="div-2 rounded-tl-xl bg-indigo-900 text-white w-full grid grid-flow-col justify-between items-center">
                    <a href="{{ url('matches') }}" class="gold-pill-btn m-2 align-middle h-min md:inline hidden"><span
                            class="material-icons text-xl align-top">
                            arrow_back
                        </span>Partits</a>
                    <a href="{{ url('matches') }}" class="gold-pill-btn m-2 align-middle h-min md:hidden"><span
                            class="material-icons text-xl align-top">
                            arrow_back
                        </span></a>
                    <div class="flex flex-nowrap">
                        <a href="{{ url('matches/' . $match->id . '/edit') }}"
                            class="gold-pill-btn m-2 align-middle h-min md:inline hidden"><span
                                class="material-icons text-xl align-top">
                                edit
                            </span>Edita</a>
                        <a href="{{ url('matches/' . $match->id . '/edit') }}"
                            class="gold-pill-btn m-2 align-middle h-min md:hidden"><span
                                class="material-icons text-xl align-top">
                                edit
                            </span></a>
                        <a href="{{ url('matches/' . $match->id . '/delete') }}"
                            class="red-pill-btn m-2 align-middle h-min md:inline hidden"><span
                                class="material-icons text-xl align-top">
                                delete
                            </span>Elimina</a>
                        <a href="{{ url('matches/' . $match->id . '/delete') }}"
                            class="red-pill-btn m-2 align-middle h-min md:hidden"><span
                                class="material-icons text-xl align-top">
                                delete
                            </span></a>
                            @if ($match->match_date < now() && $match->match_result_id == null)
                                <a href="{{ url('results/add/' . $match->id ) }}"
                                    class="gold-pill-btn m-2 align-middle h-min md:inline hidden"><span
                                        class="material-icons text-xl align-top">
                                        add_circle
                                    </span>Afegeix un resultat</a>
                                <a href="{{ url('results/add/' . $match->id) }}"
                                    class="gold-pill-btn m-2 align-middle h-min md:hidden"><span
                                        class="material-icons text-xl align-top">
                                        add_circle emoji_events
                                    </span></a>
                            @elseif ($match->match_date < now() && $resultat)
                                <a href="{{ url('results/' . $match->match_result_id.'/edit') }}"
                                    class="gold-pill-btn m-2 align-middle h-min md:inline hidden"><span
                                        class="material-icons text-xl align-top">
                                        edit
                                    </span>Edita resultat</a>
                                <a href="{{  url('results/' . $match->match_result_id.'/edit') }}"
                                    class="gold-pill-btn m-2 align-middle h-min md:hidden"><span
                                        class="material-icons text-xl align-top">
                                        edit emoji_events
                                    </span></a>
                                    <a href="{{ url('results/' . $match->match_result_id.'/delete') }}"
                                        class="red-pill-btn m-2 align-middle h-min md:inline hidden"><span
                                            class="material-icons text-xl align-top">
                                            delete
                                        </span>Elimina resultat</a>
                                    <a href="{{  url('results/' . $match->match_result_id.'/delete') }}"
                                        class="red-pill-btn m-2 align-middle h-min md:hidden"><span
                                            class="material-icons text-xl align-top">
                                            delete emoji_events
                                        </span></a>
                            @endif
                    </div>

                </div>
            </div>
            <!--Match details-->
            <div class="grid grid-flow-row gap-1 justify-items-center text-left items-center p-2">

                <p class="text-xl text-green-900">
                    <span
                    class="material-icons text-xl align-top">
                    event
                </span> {{$match->getDate()}}
                </p>
                <p class="text-xl text-green-900">
                    <span
                    class="material-icons text-xl align-top">
                    place
                </span>
                    {{$match->location()->withTrashed()->first()->stadium_name}} ({{$match->location()->withTrashed()->first()->city}}, {{$match->location()->withTrashed()->first()->state}})
                </p>

                <div class="grid grid-flow-row md:grid-flow-col p-2 text-center w-full @if (!$resultat) gap-1 @endif">
                    <div class="list-card-bg md:rounded-bl-xl @if($resultat) rounded-bl-none @endif text-white text-2xl w-full p-2 mt-2 md:mt-0">{{$match->team1()->withTrashed()->first()->name}}</div>
                    @if ($resultat)
                        <div class="result-item-bg text-2xl w-full p-2">{{$match->results()->withTrashed()->first()->goals_team1}}</div>
                    @endif
                    <div class="list-card-bg md:rounded-bl-xl @if($resultat) rounded-bl-none @endif text-white text-2xl w-full p-2 mt-2 md:mt-0">{{$match->team2()->withTrashed()->first()->name}}</div>
                    @if ($resultat)
                        <div class="result-item-bg text-2xl w-full p-2">{{$match->results()->withTrashed()->first()->goals_team2}}</div>
                    @endif
                </div>
                
                
                @if ($match->match_date > now())
                    <p class="justify-self-center text-white font-bold w-2/4 rounded-lg text-center bg-red-900 text-xl">Pendent de disputar</p>
                @elseif (!$resultat)
                    <p class="justify-self-center text-white font-bold w-2/4 rounded-lg text-center bg-red-900 text-xl">Pendent del resultat</p>
                @endif
                
            </div>
      

        </div>

    </div>
@endsection
