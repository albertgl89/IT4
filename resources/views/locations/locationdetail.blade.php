@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Team;
use App\Models\Match;
$isAdmin = Auth::user()->hasRole('admin');
@endphp

@section('page-title', 'Detall de la localització')


@section('content')
    <div class="grid grid-flow-row w-full mt-2 font-heebo">

        <div class="w-3/4 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">

            <!--Action buttons-->
            <div class="mb-2 w-full mx-auto">
                <div
                    class="div-2 rounded-tl-xl bg-indigo-900 text-white w-full grid grid-flow-col justify-between items-center">
                    <a href="{{ url('locations') }}" class="gold-pill-btn m-2 align-middle h-min md:inline hidden"><span
                            class="material-icons text-xl align-top">
                            arrow_back
                        </span>Localitzacions</a>
                    <a href="{{ url('locations') }}" class="gold-pill-btn m-2 align-middle h-min md:hidden"><span
                            class="material-icons text-xl align-top">
                            arrow_back
                        </span></a>
                    @if ($isAdmin)
                        <div class="flex flex-nowrap">
                            <a href="{{ url('locations/' . $location->id . '/edit') }}"
                                class="gold-pill-btn m-2 align-middle h-min md:inline hidden"><span
                                    class="material-icons text-xl align-top">
                                    edit
                                </span>Edita</a>
                            <a href="{{ url('locations/' . $location->id . '/edit') }}"
                                class="gold-pill-btn m-2 align-middle h-min md:hidden"><span
                                    class="material-icons text-xl align-top">
                                    edit
                                </span></a>
                            <a href="{{ url('locations/' . $location->id . '/delete') }}"
                                class="red-pill-btn m-2 align-middle h-min md:inline hidden"><span
                                    class="material-icons text-xl align-top">
                                    delete
                                </span>Elimina</a>
                            <a href="{{ url('locations/' . $location->id . '/delete') }}"
                                class="red-pill-btn m-2 align-middle h-min md:hidden"><span
                                    class="material-icons text-xl align-top">
                                    delete
                                </span></a>
                        </div>
                    @endif
                </div>
            </div>
            <!--Location details-->
            <div class="grid grid-flow-row md:grid-flow-col gap-1 justify-items-left text-justify items-center p-2 place-self-start w-full">
                <div>
                    <p class="font-rubik text-2xl text-green-900 p-2">{{ $location->stadium_name }}</p>
                    <p class="p-2"><a href="{{ url('cities/' . $location->id) }}"
                            class="std-link">{{ $location->city }}</a>, <a href="{{ url('states/' . $location->id) }}"
                            class="std-link">{{ $location->state }}</a></p>
                </div>
                <div>
                    <p>Equips amb base en aquest estadi: </p>
                    <ul>
    
                        @forelse ($location->teams()->get() as $team)
                            <li class="m-2"><a href="{{ url('teams', [$team->id]) }}"
                                    class="green-pill-btn m-1"><span class="material-icons text-sm align-middle p-1">
                                        group
                                    </span>{{ $team->name }}</a></li>
                        @empty
                            <p class="m-2"> No hi ha cap equip amb base en aquest estadi encara. </p>
                        @endforelse
    
                    </ul>
                    <p>Estadis a la mateixa ciutat: </p>
                    <ul>
                        @if (Location::where('city', $location->city)->count() <= 1)
                            <p class="m-2"> No hi ha cap altre estadi en aquesta mateixa ciutat.</p>
                        @else
                            @foreach (Location::where('city', $location->city)->get() as $loc)
    
                                <li class="m-2"><a href="{{ url('locations', [$loc->id]) }}"
                                        class="green-pill-btn"><span class="material-icons text-sm align-middle p-1">
                                            place
                                        </span>{{ $loc->stadium_name }}</a></li>
    
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="m-2">
                <br>
                <p class="font-rubik text-2xl text-green-900 p-2">Estadístiques</p>
                <!--Stats-->
                <div class="list-item-bg">
                    <p class="text-center md:text-left">Total partits disputats en aquest estadi</p>
                    <p class="text-center">{{ Match::where('location_id', $location->id)->where('match_date', '<', now())->withTrashed()->count() }}</p>
                </div>
            </div>    
                
        </div>

    </div>
@endsection
