@extends('layouts.base')

@php
use App\Models\Match;
use App\Models\Team;
use App\Models\Location;
@endphp

@section('page-title', 'Afegir nou resultat a un partit')


@section('content')
    <div class="grid grid-flow-row w-full mt-2 font-heebo">

        <div class="w-3/4 mx-auto rounded-tl-xl rounded-br-xl bg-white grid grid-flow-row shadow pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full"><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                    search
                    </span>Selecciona el partit al qual vols registrar-hi un resultat</p>
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

            <form action="{{url('results/add/')}}" method="get" class="std-form">
                @csrf
                @if (Match::where('match_result_id', null)->count() == 0)
                    <p class="font-heebo mx-auto w-full text-center">No hi ha cap partit registrat encara, tots els partits ja tenen resultats guardats, o bé els partits no s'han disputat encara.</p>
                @else
                    @foreach (Match::where('match_result_id', null)->where('match_date', '<', now())->get() as $match)
                    <div class="group std-form-radio-div">
                        <input type="radio" name="match_id" id="{{$match->id}}" value="{{$match->id}}" class="peer std-form-radio-input">
                        <label for="{{$match->id}}" class="std-form-radio-label">
                            <span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 mb-1 bg-white text-indigo-900">
                                groups
                                </span>{{$match->team1()->withTrashed()->first()->name}} vs {{$match->team2()->withTrashed()->first()->name}}<br><span class="material-icons text-xl align-top pr-2 pl-2 mb-1 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                                    place
                                    </span>{{$match->location()->withTrashed()->first()->stadium_name}}<br><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 mb-1 bg-white text-indigo-900">
                                        event
                                        </span>{{$match->getDate()}}
                        </label>
                    </div>
                    @endforeach

            

                <input type="submit" value="Continuar" class=" w-full mt-4 green-pill-btn">
                @endif
            </form>

        </div>

    </div>
@endsection
