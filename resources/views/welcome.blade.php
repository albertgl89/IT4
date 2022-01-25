@extends('layouts.base')

@section('page-title', 'Dashboard')


@section('content')
    <div class="grid grid-flow-row md:grid-flow-col gap-2 w-full mt-2">

        <div class="rounded-lg grid grid-flow-row gap-2 border border-indigo-900 shadow-md pb-2 bg-indigo-100">
            <div class="mb-2 w-full mx-auto">
                <p class="p-2 rounded-t-md bg-indigo-900 border border-indigo-900 text-white w-full">Gestió d'equips</p>
            </div>
            <a href="{{url('teams')}}" class="green-pill-btn">Mostra equips</a>
            <a href="{{url('teams/add')}}" class="green-pill-btn">Crea equip</a>
        </div>

        <div class="rounded-lg grid grid-flow-row gap-2 border border-indigo-900 shadow-md pb-2 bg-indigo-100">
            <div class="mb-2 w-full mx-auto">
                <p class="p-2 rounded-t-md bg-indigo-900 text-white w-full">Gestió de partits</p>
            </div>
            <a href="{{url('matches')}}" class="green-pill-btn">Mostra partits</a>
            <a href="{{url('matches/add')}}" class="green-pill-btn">Crea partit</a>
            <a href="{{url('results/selectmatch')}}" class="green-pill-btn">Registra un resultat</a>
        </div>

        <div class="rounded-lg grid grid-flow-row gap-2 border border-indigo-900 shadow-md pb-2 bg-indigo-100">
            <div class="mb-2 w-full mx-auto">
                <p class="p-2 rounded-t-md bg-indigo-900 text-white w-full">Gestió de localitzacions</p>
            </div>
            <a href="{{url('locations')}}" class="green-pill-btn">Mostra localitzacions</a>
            <a href="{{url('locations/add')}}" class="green-pill-btn">Crea localització</a>
        </div>

    </div>
@endsection
