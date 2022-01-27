@extends('layouts.base')

@section('page-title', 'Dashboard')


@section('content')
    <div class="grid grid-flow-row md:grid-flow-col gap-2 w-full mt-2 font-heebo">

        <div class="">
            <div class="w-full mx-auto">
                <p class="p-2 rounded-tl-md bg-indigo-900 text-white w-full">Gestió d'equips</p>
            </div>

            <div class="rounded-br-lg grid grid-flow-row gap-2  shadow-md p-2 bg-white">
                <a href="{{url('teams')}}" class="green-pill-btn">Mostra equips</a>
                <a href="{{url('teams/add')}}" class="green-pill-btn">Crea equip</a>
            </div>
        </div>
        
        <div>
            <div class="w-full mx-auto">
                <p class="p-2 rounded-tl-md bg-indigo-900 text-white w-full">Gestió de partits</p>
            </div>
            <div class="rounded-br-lg grid grid-flow-row gap-2 shadow-md p-2 bg-white">
                <a href="{{url('matches')}}" class="green-pill-btn">Mostra partits</a>
                <a href="{{url('matches/add')}}" class="green-pill-btn">Crea partit</a>
                <a href="{{url('results/selectmatch')}}" class="green-pill-btn">Registra un resultat</a>
            </div>
        </div>

       <div>
        <div class="w-full mx-auto">
            <p class="p-2 rounded-tl-md bg-indigo-900 text-white w-full">Gestió de localitzacions</p>
        </div>

        <div class="rounded-br-lg grid grid-flow-row gap-2 shadow-md p-2 bg-white">
            <a href="{{url('locations')}}" class="green-pill-btn">Mostra localitzacions</a>
            <a href="{{url('locations/add')}}" class="green-pill-btn">Crea localització</a>
        </div>

       </div>

        
    </div>
@endsection
