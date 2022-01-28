@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Team;
//To avoid retrieving null locations when a location from a team has been deleted, but team still exists
$location = ['stadium_name' => 'Sense estadi associat', 'city' => 'Sense ciutat associada', 'state' => 'Sense país associat'];
if ($team->location()->first() != null) {
    $location['stadium_name'] = $team->location()->first()->stadium_name;
    $location['city'] = $team->location()->first()->city;
    $location['state'] = $team->location()->first()->state;
}
@endphp

@section('page-title', 'Detall de l\'equip')


@section('content')
    <div class="grid grid-flow-row w-full mt-2 font-heebo">

        <div class="w-3/4 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">
            <!--Action buttons-->
            <div class="mb-2 w-full mx-auto">
                <div
                    class="div-2 rounded-tl-xl bg-indigo-900 text-white w-full grid grid-flow-col justify-between items-center">
                    <a href="{{ url('teams') }}" class="gold-pill-btn m-2 align-middle h-min md:inline hidden"><span
                            class="material-icons text-xl align-top">
                            arrow_back
                        </span>Equips</a>
                    <a href="{{ url('teams') }}" class="gold-pill-btn m-2 align-middle h-min md:hidden"><span
                            class="material-icons text-xl align-top">
                            arrow_back
                        </span></a>
                    <div class="flex flex-nowrap">
                        <a href="{{ url('teams/' . $team->id . '/edit') }}"
                            class="gold-pill-btn m-2 align-middle h-min md:inline hidden"><span
                                class="material-icons text-xl align-top">
                                edit
                            </span>Edita</a>
                        <a href="{{ url('teams/' . $team->id . '/edit') }}"
                            class="gold-pill-btn m-2 align-middle h-min md:hidden"><span
                                class="material-icons text-xl align-top">
                                edit
                            </span></a>
                        <a href="{{ url('teams/' . $team->id . '/delete') }}"
                            class="red-pill-btn m-2 align-middle h-min md:inline hidden"><span
                                class="material-icons text-xl align-top">
                                delete
                            </span>Elimina</a>
                        <a href="{{ url('teams/' . $team->id . '/delete') }}"
                            class="red-pill-btn m-2 align-middle h-min md:hidden"><span
                                class="material-icons text-xl align-top">
                                delete
                            </span></a>
                    </div>

                </div>
            </div>
            <!--Team details-->
            <div class="grid grid-flow-row gap-1 justify-items-left text-justify items-center p-2 place-self-start w-full">

                <p class="font-rubik text-2xl text-green-900 p-2">{{ $team->name }}</p>
                <p class="p-2">Nom abreviat de l'equip: {{ $team->short_name }}</p>
                @if ($team->city != null)
                    <p class="p-2">
                        <a href="{{ url('locations', [$team->city]) }}" class="green-pill-btn"><span
                                class="material-icons text-xl align-top mr-1">
                                place
                            </span>{{ $location['stadium_name'] }}</a>
                    </p>
                    <p class="p-2">Ciutat de l'equip: {{ $location['city'] }}</p>
                    <p class="p-2">País de l'equip: {{ $location['state'] }}</p>
                @else
                    <p class="p-2">
                        <a href="{{ url('locations/add/' . $team->id) }} " class="green-pill-btn">
                            <span class="material-icons text-xl align-top mr-1">
                                add_circle
                            </span>{{ $location['stadium_name'] }}</a>
                    </p>
                @endif
                <p class="p-2">Alta al sistema: {{ $team->created_at }}</p>
                <p class="p-2">Darrera actualització: {{ $team->updated_at }}</p>

                <p class="font-rubik text-2xl text-green-900 p-2">Estadístiques</p>
                <!--Stats-->
                <div class="list-item-bg">
                    <p class="text-center md:text-left">Total partits disputats</p>
                    <p class="text-center">{{$team->countMatches()}}</p>
                </div>
                <div class="list-item-bg">
                    <p class="text-center md:text-left">Total victòries</p>
                    <p class="text-center">{{$team->wins()->count()}}</p>
                </div>
                <div class="list-item-bg">
                    <p class="text-center md:text-left">Total empats</p>
                    <p class="text-center">{{$team->ties()}}</p>
                </div>
                <div class="list-item-bg">
                    <p class="text-center md:text-left">Total derrotes</p>
                    <p class="text-center">{{$team->losses()}}</p>
                </div>
            </div>


        </div>

    </div>
@endsection
