@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Team;
$location = ["stadium_name" => "Sense estadi associat", "city" => "Sense ciutat associada", "state" => "Sense país associat"];
if($team->location()->first() != null){
    $location["stadium_name"] = $team->location()->first()->stadium_name;
    $location["city"] = $team->location()->first()->city;
    $location["state"] = $team->location()->first()->state;
}
@endphp

@section('page-title', 'Detall de l\'equip')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-lg grid grid-flow-row shadow border-2 pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">
                    <a href="{{url('teams')}}" class="gold-pill-btn m-2 align-middle"><span class="material-icons text-xl align-middle">
                        arrow_back
                        </span>Torna</a>
                </p>
            </div>

            <div class="grid grid-flow-row gap-1 justify-items-center text-left items-center p-2">
                
                <p class="">Nom complet de l'equip: {{ $team->name }}</p>
                <p class="">Nom abreviat de l'equip: {{ $team->short_name }}</p>
                <p class="">Estadi de l'equip: <a href="@if ($team->city != null) {{url('locations', [$team->city]);}}@else {{url('locations/add/'.$team->id)}} @endif" class="std-link">{{ $location["stadium_name"]}}</a></p>
                <p class="">Ciutat de l'equip: {{ $location["city"] }}</p>
                <p class="">País de l'equip: {{ $location["state"] }}</p>
                <p class="">Alta al sistema: {{ $team->created_at }}</p>
                <p class="">Darrera actualització: {{ $team->updated_at }}</p>
                <hr class="border border-indigo-900 border-dotted w-5/6">
                <p class="">Total partits disputats: TODO</p>
                <p class="">Total victòries acumulades: TODO</p>
                <p class="">Total empats: TODO</p>
                <p class="">Total derrotes: TODO</p>
            </div>
      

        </div>

    </div>
@endsection
