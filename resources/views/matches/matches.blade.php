@extends('layouts.base')
@php
use App\Models\Match;
use App\Models\Team;
use App\Models\Location;
use App\Models\MatchResult;
@endphp
@section('page-title', 'Partits')
@section('actions')
<div class="flex flex-nowrap text-base justify-items-start gap-2">
    <a href="{{url('matches/add')}}" class="green-pill-btn mx-0 h-fit w-fit"><span class="material-icons text-xl align-top pr-2">
        add_circle
        </span>Crea partit</a>
        <a href="{{url('results/selectmatch')}}" class="green-pill-btn mx-0 h-fit w-fit"><span class="material-icons text-xl align-top pr-2">
            emoji_events
            </span>Registra un resultat</a>
</div>

@endsection


@section('content')
    <div class="grid grid-flow-col w-full mt-2">

        @if (Match::all()->count() == 0)
            <div>
                <p class="font-heebo font-bold text-center">No hi ha cap equip encara.</p>
            </div>
        @endif

        <div class="grid grid-flow-row md:grid-cols-3 lg:grid-cols-4 gap-2 font-heebo">
            @foreach (Match::all() as $match)
                <div
                    class="list-card-bg text-white min-w-fit max-w-1/4 p-2 m-2 grid grid-flow-col md:grid-flow-row gap-1 md:items-center md:content-center justify-around">
                   <div class="grid md:grid-flow-col gap-1 grid-flow-row h-min w-full place-self-center p-1">
                    @if ($match->match_date > now())
                    <div class="bg-orange-400 text-indigo-900 text-xs font-bold text-center w-full p-1 rounded-sm">
                        <p>Pendent de disputar</p>
                    </div>
                @else 
                    <div class="bg-green-400 text-indigo-900 text-xs font-bold text-center align-middle w-full p-1 rounded-sm my-auto">
                        <p>Disputat</p>
                    </div>
                    @if ($match->match_result_id == null)
                        <div class="bg-orange-400 text-indigo-900 text-xs font-bold text-center w-full p-1 rounded-sm">
                            <p>Esperant resultat</p>
                        </div>
                    @else 
                        <div class="bg-indigo-400 text-white text-xs text-center w-full p-1 rounded-sm">
                            <p class="font-heebo">{{ $match->team1()->withTrashed()->first()->short_name }}<span class="rounded-sm bg-white shadow-inner text-center text-green-900 px-1 mx-1">{{$match->results()->first()->goals_team1}}</span>
                                {{ $match->team2()->withTrashed()->first()->short_name }}<span class="rounded-sm bg-white shadow-inner text-center text-green-900 px-1 mx-1">{{$match->results()->first()->goals_team2}}</span></p>
                        </div>
                    @endif
                @endif
                   </div>
                   
                   
                    <div class="grid grid-flow-row justify-items-center items-center mb-2 p-1">
                        <p class="font-rubik p-2 shadow-xl bg-white rounded-tr-xl text-black m-2 mb-0 w-full text-center">{{ $match->team1()->withTrashed()->first()->name }} <br> <span class="animation-ping bg-indigo-400 rounded-tr-xl rounded-bl-xl p-1 text-white"> vs </span>  <br> {{ $match->team2()->withTrashed()->first()->name }} </p>
                        <p class="font-rubik shadow-xl rounded-bl-xl bg-indigo-400 text-white w-full justify-self-center text-center">{{$match->getDate();}}</p>                        
                    </div>
                    
                    <div class="grid grid-flow-col p-1 text-center md:flex md:flex-wrap md:max-w-none max-w-[30%] md:justify-items-around justify-items-center content-center items-center md:gap-2 gap-2">
                        <a href="matches/{{ $match->id }}" class="gold-pill-btn w-fit md:w-full">Detalls</a>
                        <a href="{{url('matches/'.$match->id.'/edit')}}" class="sm:inline hidden md:justify-self-stretch md:flex-1"><span class="material-icons text-xl gold-pill-btn md:w-full">
                            edit
                            </span></a>
                        <a href="{{url('matches/'.$match->id.'/delete')}}" class="sm:inline hidden md:place-self-stretch md:flex-1"><span class="material-icons text-xl red-pill-btn md:w-full">
                                delete
                                </span></a>
                    </div>


                </div>

            @endforeach
        </div>


    </div>

@endsection

@section('messages')
    <x-status-message />
@endsection