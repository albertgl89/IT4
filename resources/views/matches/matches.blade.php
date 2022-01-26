@extends('layouts.base')
@php
use App\Models\Match;
use App\Models\Team;
use App\Models\Location;
use App\Models\MatchResult;
@endphp
@section('page-title', 'Partits')


@section('content')
    <p>Llistat de tots els partits del sistema</p>
    <div class="grid grid-flow-col w-full mt-2">

        @if (session('status'))
            <div class="rounded-xl bg-green-700 text-white font-bold p-2 w-3/4 mx-auto text-center">
                {{ session('status') }}
            </div>
        @endif

        @if (Match::all()->count() == 0)
            <div>
                <p>No hi ha cap equip encara.</p>
            </div>
        @endif

        <div class="grid grid-flow-row md:grid-cols-4 gap-2">
            @foreach (Match::all() as $match)

                <div
                    class="rounded-xl border border-indigo-900 hover:bg-indigo-600 bg-indigo-800 text-white min-w-fit max-w-1/4 p-2 m-2 grid grid-flow-col md:grid-flow-row gap-1 shadow-md md:items-center md:content-center justify-around">
                   <div class="grid md:grid-flow-col gap-1 grid-flow-row h-min w-full place-self-center">
                    @if ($match->match_date > now())
                    <div class="bg-orange-400 text-indigo-900 text-xs text-center w-full p-1 rounded-sm">
                        <p>Pendent de disputar</p>
                    </div>
                @else 
                    <div class="bg-green-400 text-indigo-900 text-xs text-center w-full p-1 rounded-sm">
                        <p>Disputat</p>
                    </div>
                    @if ($match->match_result_id == null)
                        <div class="bg-red-400 text-indigo-900 text-xs text-center w-full p-1 rounded-sm">
                            <p>Esperant resultat</p>
                        </div>
                    @else 
                        <div class="bg-green-400 text-indigo-900 text-xs text-center w-full p-1 rounded-sm">
                            <p>Resultat registrat</p>
                        </div>
                    @endif
                @endif
                   </div>
                   
                   
                    <div class="grid grid-flow-row justify-items-center items-center">
                        <p class="font-rubik rounded-md p-2 shadow-xl bg-indigo-200 text-black m-2 w-full text-center">{{ $match->team1()->withTrashed()->first()->name }} <br> vs <br> {{ $match->team2()->withTrashed()->first()->name }} </p>
                        <p class="font-rubik justify-self-center text-center">{{$match->match_date}}</p>
                        
                        
                    </div>
                    
                    <div class="grid grid-flow-col md:max-w-none max-w-[30%] justify-items-center content-center items-center md:gap-1 gap-2">
                        <a href="matches/{{ $match->id }}" class="gold-pill-btn w-fit">Detalls</a>
                        <a href="{{url('matches/'.$match->id.'/edit')}}"><span class="material-icons text-xl gold-pill-btn">
                            edit
                            </span></a>
                            <a href=""><span class="material-icons text-xl red-pill-btn">
                                delete
                                </span></a>
                    </div>


                </div>

            @endforeach
        </div>


    </div>

@endsection