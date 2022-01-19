@extends('layouts.base')

@section('page-title', 'Dashboard')


@section('content')
    <div class="grid grid-flow-col gap-2 w-full mt-2">

        <div class="rounded-lg grid grid-flow-row shadow border-2 pb-2">
            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">Gestió d'equips</p>
            </div>
            <form action="teams" method="get" class="mx-auto">
                <input type="submit" value="Mostra equips" class="green-pill-btn">
            </form>
        </div>

        <div class="rounded-lg grid grid-flow-row shadow border-2 pb-2">
            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">Gestió de partits</p>
            </div>
            <form action="matches" method="get" class="mx-auto">
                <input type="submit" value="Mostra partits" class="green-pill-btn">
            </form>
        </div>

    </div>
@endsection
