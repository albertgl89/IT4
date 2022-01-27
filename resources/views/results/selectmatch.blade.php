@extends('layouts.base')

@php
use App\Models\Match;
use App\Models\Team;
use App\Models\Location;
@endphp

@section('page-title', 'Afegir nou resultat a un partit')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-br-xl bg-white grid grid-flow-row shadow pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full"><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                    add_circle
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

            <form action="add/{match}" method="get" class="std-form">
                @csrf
                @if (Match::where('match_result_id', null)->count() == 0)
                    <p class="mx-auto w-full text-center">No hi ha cap partit registrat encara, o tots els partits ja tenen resultats guardats.</p>
                @else
                    @foreach (Match::where('match_result_id', null)->get() as $match)
                    <div class="grid grid-flow-col border rounded-lg border-indigo-900 hover:border-green-600 p-2 m-1 justify-start content-center">
                        <input type="radio" name="match_id" id="{{$match->id}}" value="{{$match->id}}" class="peer std-form-radio">
                        <label for="{{$match->id}}" class="text-indigo-600">
                        {{Team::find($match->team1)->name}} vs {{Team::find($match->team2)->name}} @ {{Location::find($match->location_id)->stadium_name}}, {{$match->match_date}}
                        </label>
                    </div>
                    @endforeach

            

                <input type="submit" value="Continuar" class=" w-full mt-4 green-pill-btn">
                @endif
            </form>

        </div>

    </div>
@endsection
