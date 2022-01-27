@extends('layouts.base')

@php
use App\Models\Match;
use App\Models\Team;
use App\Models\Location;
@endphp

@section('page-title', 'Afegir un resultat')


@section('content')
    <div class="grid grid-flow-row w-full mt-2 font-heebo">

        <div class="w-3/4 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full"><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                    add_circle
                    </span>Emplena amb el número de gols que ha marcat cada equip al final del partit</p>
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

            @if ($match == null || !isset($match))
                @php 
                //If any issues finding a match, return to previous page, don't allow the use of this view
                return back()->withInput(); 
                @endphp
            @endif

            <form action="{{url('results/add')}}" method="post" class="std-form">
                @csrf
                <div class="rounded-xl bg-yellow-500 text-indigo-900 p-2 mb-2 w-full mx-auto text-center">
                    Partit celebrat en <b>{{$match->match_date}}</b><br> a <b>{{$match->location()->withTrashed()->first()->stadium_name}}</b> entre <br>
                    <b>{{ $match->team1()->withTrashed()->first()->name}}</b> i <b>{{ $match->team2()->withTrashed()->first()->name }}</b>
                </div>
                <div class="grid grid-flow-col gap-2">
                    <input type="hidden" name="match" value="{{$match->id}}">
                    <div class="border rounded-xl shadow p-2 text-center text-xl font-bold grid grid-flow-row gap-2">
                        {{ $match->team1()->withTrashed()->first()->short_name }}
                        <input type="hidden" name="team1" value="{{$match->team1}}">
                        <input type="number" name="goals_team1" id="" class="std-form-number-input" value="{{old('goals_team1')}}">
                    </div>
                    <div class="border rounded-xl shadow p-2 text-center text-xl font-bold grid grid-flow-row gap-2">
                        {{ $match->team2()->withTrashed()->first()->short_name}}
                        <input type="hidden" name="team2" value="{{$match->team2}}">
                        <input type="number" name="goals_team2" id="" class="std-form-number-input" value="{{old('goals_team2')}}">
                    </div>
                </div>
            

                <input type="submit" value="Desa aquest resultat" class=" w-full mt-4 green-pill-btn">
            </form>

        </div>

    </div>
@endsection
