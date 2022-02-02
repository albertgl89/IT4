@extends('layouts.base')

@section('page-title', 'Dashboard')
@php
use App\Models\Team;
use App\Models\Match;
use App\Models\MatchResult;
use App\Models\Location;
@endphp


@section('content')
    <div class="grid grid-flow-row md:grid-flow-col gap-2 w-full mt-2 font-heebo">

        <div class="">
            <div class="w-full mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full"><span
                        class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                        groups
                    </span>Gestió d'equips</p>
            </div>

            <div class="rounded-br-xl grid grid-flow-row gap-2  shadow-md p-2 bg-white">
                <div class="grid md:grid-flow-row gap-2 p-2 grid-flow-col">
                    <a href="{{ url('teams') }}" class="green-pill-btn w-full text-center md:inline hidden"><span
                            class="material-icons text-xl align-top pr-2">
                            list_alt
                        </span>Mostra equips</a>
                    <a href="{{ url('teams/add') }}" class="green-pill-btn w-full text-center md:inline hidden"><span
                            class="material-icons text-xl align-top pr-2">
                            add_circle
                        </span>Crea equip</a>
                        <!--SM-->
                        <a href="{{ url('teams') }}" class="green-pill-btn w-full text-center md:hidden"><span
                            class="material-icons text-xl align-middle pl-2 pr-2">
                            list_alt
                        </span>Mostra</a>
                    <a href="{{ url('teams/add') }}" class="green-pill-btn w-full text-center md:hidden"><span
                            class="material-icons text-xl align-middle pl-2 pr-2">
                            add_circle
                        </span>Crea</a>
                </div>
                <!--info-->
                <div class="grid grid-cols-2 md:grid-flow-row md:grid-cols-none md:gap-2 gap-1 mb-2">
                    <div class="dashboard-info-div">
                        <p class="text-indigo-900 text-lg">Total equips</p>
                        <p class="font-heebo text-2xl text-indigo-900">{{Team::all()->count()}}</p>
                    </div>
                    <div class="dashboard-info-div">
                        <p class="text-indigo-900 text-lg">Equips sense localització</p>
                        <p class="font-heebo text-2xl text-indigo-900">{{Team::all()->where('city', null)->count()}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="w-full mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full"><span
                        class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                        sports_soccer
                    </span>Gestió de partits</p>
            </div>
            <div class="rounded-br-xl grid grid-flow-row gap-2 shadow-md p-2 bg-white">
                <div class="grid md:grid-flow-row gap-2 p-2 grid-flow-col">
                    <a href="{{ url('matches') }}" class="green-pill-btn w-full text-center md:inline hidden"><span
                            class="material-icons text-xl align-top pr-2">
                            list_alt
                        </span>Mostra partits</a>
                    <a href="{{ url('matches/add') }}" class="green-pill-btn w-full text-center md:inline hidden"><span
                            class="material-icons text-xl align-top pr-2">
                            add_circle
                        </span>Crea partit</a>
                    <a href="{{ url('results/selectmatch') }}"
                        class="green-pill-btn w-full text-center md:inline hidden"><span
                            class="material-icons text-xl align-top pr-2">
                            emoji_events
                        </span>Registra un resultat</a>
                    <!--SM-->
                    <a href="{{ url('matches') }}" class="green-pill-btn w-full text-center md:hidden"><span
                            class="material-icons text-xl align-middle pl-2 pr-2">
                            list_alt
                        </span>Mostra</a>
                    <a href="{{ url('matches/add') }}" class="green-pill-btn w-full text-center md:hidden"><span
                            class="material-icons text-xl align-middle pl-2 pr-2">
                            add_circle
                        </span>Crea</a>
                    <a href="{{ url('results/selectmatch') }}" class="green-pill-btn w-full text-center md:hidden"><span
                            class="material-icons text-xl align-middle pl-2 pr-2">
                            add_circle
                        </span>Resultat</a>
                </div>
                <!--info-->
                <div class="grid grid-cols-2 md:grid-flow-row md:grid-cols-none md:gap-2 gap-1 mb-2">
                    <div class="dashboard-info-div">
                        <p class="text-indigo-900 text-lg">Total partits</p>
                        <p class="font-heebo text-2xl text-indigo-900">{{Match::all()->count()}}</p>
                    </div>
                    <div class="dashboard-info-div">
                        <p class="text-indigo-900 text-lg">Partits disputats</p>
                        <p class="font-heebo text-2xl text-indigo-900">{{Match::all()->where('match_date','<', now())->count()}}</p>
                    </div>
                    <div class="dashboard-info-div">
                        <p class="text-indigo-900 text-lg">Partits a disputar</p>
                        <p class="font-heebo text-2xl text-indigo-900">{{Match::all()->where('match_date','>', now())->count()}}</p>
                    </div>
                    <div class="dashboard-info-div">
                        <p class="text-indigo-900 text-lg">Pendents de resultats</p>
                        <p class="font-heebo text-2xl text-indigo-900">{{Match::all()->where('match_date','<', now())->where('match_result_id', null)->count()}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="w-full mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full"><span
                        class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                        place
                    </span>Gestió de localitzacions</p>
            </div>

            <div class="rounded-br-xl grid grid-flow-row gap-2 shadow-md p-2 bg-white">
                <div class="grid md:grid-flow-row gap-2 p-2 grid-flow-col">
                    <a href="{{ url('locations') }}" class="green-pill-btn w-full text-center md:inline hidden"><span
                            class="material-icons text-xl align-top pr-2">
                            list_alt
                        </span>Mostra localitzacions</a>
                    <a href="{{ url('locations/add') }}" class="green-pill-btn w-full text-center md:inline hidden"><span
                            class="material-icons text-xl align-top pr-2">
                            add_circle
                        </span>Crea localització</a>
                    <!--SM-->
                    <a href="{{ url('locations') }}" class="green-pill-btn w-full text-center md:hidden"><span
                            class="material-icons text-xl align-middle pl-2 pr-2">
                            list_alt
                        </span>Mostra</a>
                    <a href="{{ url('locations/add') }}" class="green-pill-btn w-full text-center md:hidden"><span
                            class="material-icons text-xl align-middle pl-2 pr-2">
                            add_circle
                        </span>Crea</a>
                </div>
                <!--info-->
                <div class="grid grid-cols-2 md:grid-flow-row md:grid-cols-none md:gap-2 gap-1 mb-2">
                    <div class="dashboard-info-div">
                        <p class="text-indigo-900 text-lg">Total localitzacions</p>
                        <p class="font-heebo text-2xl text-indigo-900">{{Location::all()->count()}}</p>
                    </div>
                    <div class="dashboard-info-div">
                        <p class="text-indigo-900 text-lg">Ciutats</p>
                        <p class="font-heebo text-2xl text-indigo-900">{{Location::distinct('city')->count()}}</p>
                    </div>
                    <div class="dashboard-info-div">
                        <p class="text-indigo-900 text-lg">Països</p>
                        <p class="font-heebo text-2xl text-indigo-900">{{Location::distinct('state')->count()}}</p>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
