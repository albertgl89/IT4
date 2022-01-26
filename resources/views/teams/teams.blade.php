@extends('layouts.base')
@php
use App\Models\Team;
@endphp

@section('page-title', 'Equips')


@section('content')
    <p>Llistat de tots els equips del sistema</p>

    <div class="grid grid-flow-col w-full mt-2">

        @if (session('status'))
            <div class="rounded-xl bg-green-700 text-white font-bold p-2 w-3/4 mx-auto text-center">
                {{ session('status') }}
            </div>
        @endif

        @if (Team::all()->count() == 0)
            <div>
                <p>No hi ha cap equip encara.</p>
            </div>
        @endif

        <div class="grid grid-flow-row md:grid-cols-4 gap-2">
            @foreach (Team::all() as $team)

                <div
                    class="rounded-xl border border-indigo-900 hover:bg-indigo-600 bg-indigo-800 text-white min-w-fit max-w-1/4 p-2 m-2 grid grid-flow-col md:grid-flow-row gap-1 shadow-md md:items-center md:content-center justify-around">
                    <div class="grid grid-flow-col justify-items-center items-center">
                        <p class="font-rubik rounded-full p-4 bg-white text-green-900 m-2 w-min">{{ $team->short_name }}</p>
                        <p class="font-rubik justify-self-start">{{ $team->name }}</p>
                    </div>
                    
                    <div class="grid grid-flow-col md:max-w-none max-w-[30%] justify-items-center content-center items-center md:gap-1 gap-2">
                        <a href="teams/{{ $team->id }}" class="gold-pill-btn w-fit">Detalls</a>
                        <a href="{{url('teams/'.$team->id.'/edit')}}"><span class="material-icons text-xl gold-pill-btn">
                            edit
                            </span></a>
                            <a href="{{url('teams/'.$team->id.'/delete')}}"><span class="material-icons text-xl red-pill-btn">
                                delete
                                </span></a>
                    </div>


                </div>

            @endforeach
        </div>


    </div>

@endsection
