@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Team;
$ciutat = false;
if($team->city != null){
    $ciutat = true;
}
@endphp

@section('page-title', 'Eliminar equip')


@section('content')
    <div class="grid grid-flow-row w-full mt-2 font-heebo">

        <div class="w-full lg:w-3/4 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full">
                    <a href="{{url('teams')}}" class="gold-pill-btn m-2 align-middle"><span class="material-icons text-xl align-middle">
                        arrow_back
                        </span>Torna</a>
                </p>
            </div>

            <div class="grid grid-flow-row gap-1 justify-items-center text-left items-center p-2">
                
                <div class="rounded-lg bg-red-700 text-white p-2">
                    <p class="font-bold text-lg align-middle"><span class="material-icons text-xl align-middle p-2 m-1">
                        warning
                        </span>Atenció!</p>
                        <p>Estàs segur que vols eliminar el següent equip?</p>
                        <p>Estàs a punt de realitzar una acció irreversible.</p>                        
                        <p>Els partits disputats i ubicacions relacionats amb aquest partit <b>no</b> es veuran afectats.</p>
                </div>
                
                <p class="text-green-900 font-rubik text-2xl">{{ $team->name }}</p>
                <p class="text-left">Nom abreviat de l'equip: {{ $team->short_name }}</p>
                @if($ciutat)
                <a href="{{url('locations', [$team->city]);}}" class="green-pill-btn text-center w-fit"><span class="material-icons text-2xl my-auto align-middle">place</span>{{ $team->location()->first()->stadium_name }}</a></p>
                <a class="std-link" href="{{url('cities/' . $team->location()->first()->id)}}">{{ $team->location()->first()->city }}</a>
                <a class="std-link" href="{{url('states/' . $team->location()->first()->id)}}">{{ $team->location()->first()->state }}</a>                    
                @else
                <p>Sense localització assignada</p>  
                @endif
                
                <p class="">Alta al sistema: {{ $team->created_at }}</p>
                <p class="">Darrera actualització: {{ $team->updated_at }}</p>
                
                <br>
                <p class="font-rubik text-2xl text-green-900 p-2">Estadístiques</p>
                <!--Stats-->
                <div class="list-item-bg max-w-3/4">
                    <p class="text-center md:text-left">Total partits disputats</p>
                    <p class="text-center">{{ $team->countMatches() }}</p>
                </div>
                <div class="list-item-bg">
                    <p class="text-center md:text-left">Total victòries</p>
                    <p class="text-center">{{ $team->wins()->count() }}</p>
                </div>
                <div class="list-item-bg">
                    <p class="text-center md:text-left">Total empats</p>
                    <p class="text-center">{{ $team->ties() }}</p>
                </div>
                <div class="list-item-bg">
                    <p class="text-center md:text-left">Total derrotes</p>
                    <p class="text-center">{{ $team->losses() }}</p>
                </div>
            </div>
            

            <form action="{{url('teams/'.$team->id.'/delete')}}" method="post" class="std-form">
            @csrf
            @method('delete')
            <input type="submit" value="Esborra l'equip" class="red-pill-btn">
            <a class="gold-pill-btn text-center align-middle" href="{{url('teams')}}">Cancel·la</a>
            </form>
      

        </div>

    </div>
@endsection
