@extends('layouts.base')

@section('page-title', 'Dashboard')


@section('content')
    <div class="grid grid-flow-col gap-2 w-full mt-2">

        <div class="rounded-lg grid grid-flow-row gap-2 shadow border-2 pb-2">
            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">Gestió d'equips</p>
            </div>
            <a href="{{url('teams')}}" class="green-pill-btn">Mostra equips</a>
            <a href="{{url('teams/add')}}" class="green-pill-btn">Crea equip</a>
        </div>

        <div class="rounded-lg grid grid-flow-row shadow border-2 pb-2">
            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">Gestió de partits</p>
            </div>
            <a href="{{url('matches')}}" class="green-pill-btn">Mostra partits</a>
        </div>

        <div class="rounded-lg grid grid-flow-row shadow border-2 pb-2">
            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">Gestió de localitzacions</p>
            </div>
            <a href="{{url('locations')}}" class="green-pill-btn">Mostra localitzacions</a>
            <a href="{{url('locations/add')}}" class="green-pill-btn">Crea localització</a>
        </div>

    </div>
@endsection
