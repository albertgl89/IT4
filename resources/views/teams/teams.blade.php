@extends('layouts.base')
@php
use App\Models\Team;
@endphp

@section('page-title', 'Equips')


@section('content')
    <p class="font-heebo">Tots els equips del sistema</p>

    <div class="grid grid-flow-col w-full mt-2 font-heebo">

        @if (session('status'))
            <div class="rounded-xl bg-green-700 text-white font-bold p-2 w-3/4 mx-auto text-center font-heebo">
                {{ session('status') }}
            </div>
        @endif

        @if (Team::all()->count() == 0)
            <div>
                <p class="font-heebo font-bold text-center">No hi ha cap equip encara.</p>
            </div>
        @endif

        <div class="grid grid-flow-row md:grid-cols-4 gap-2 font-heebo w-full">
            @foreach (Team::all() as $team)
                <div class="md:flex md:flex-wrap list-card-bg text-white md:max-w-1/4 min-w-fit">
                    <div
                        class="p-2 m-2 grid grid-cols-4 md:grid-cols-4 gap-1 md:items-center md:content-center justify-around">
                        
                        <p class="md:col-span-1 font-rubik rounded-full p-4 bg-white text-green-900 m-2 w-min justify-self-center md:justify-self-start">
                            {{ $team->short_name }}</p>
                        <p class="col-start-2 col-end-3 md:col-span-2 md:col-start-3 place-self-center justify-self-start md:mx-auto">{{ $team->name }}</p>
                        
                        <div class="p-2 mx-auto my-auto grid grid-flow-col md:flex md:flex-wrap justify-items-center content-center items-center gap-2 col-span-2 md:col-span-4 w-max md:w-full">
                            
                            <a href="teams/{{ $team->id }}" class="gold-pill-btn w-fit md:w-full text-center">Detalls</a>
                            <a href="{{ url('teams/' . $team->id . '/edit') }}" class="sm:inline hidden w-1/3 md:flex-1 md:justify-self-stretch"><span
                                    class="material-icons text-xl gold-pill-btn md:w-full text-center">
                                    edit
                                </span></a>
                            <a href="{{ url('teams/' . $team->id . '/delete') }}" class="sm:inline hidden w-1/3 md:flex-1 md:justify-self-stretch"><span
                                    class="material-icons text-xl red-pill-btn md:w-full text-center">
                                    delete
                                </span></a>

                        </div>

                    </div>

                </div>

            @endforeach
        </div>


    </div>

@endsection
