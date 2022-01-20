@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Team;
$teamId = Request::query('team', null);
$team = Team::where('id', $teamId)->first();
@endphp

@section('page-title', 'Afegir nova localització')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-lg grid grid-flow-row shadow border-2 pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">Emplena tots els camps amb la informació
                    necessària</p>
            </div>

            @if ($team != null)
                <div class="rounded-xl bg-yellow-500 text-black p-2 w-3/4 mx-auto">
                    <p class="text-center font-bold">Afegint nova localització per a l'equip
                        {{ $team->name . ' (' . $team->short_name . ')' }}</p>
                </div>
            @endif




            @if ($errors->any())
                <div class="rounded-xl bg-red-800 text-white p-2 w-3/4 mx-auto">
                    <p>Atenció! S'han trobat els errors següents:</p>
                    <ul class="bg-white/50 text-black rounded-lg shadow p-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="add" method="post" class="std-form">
                @csrf
                <label for="city" class="std-form-label">Ciutat</label>
                <input type="text" name="city" id="" placeholder="Barcelona" class="std-form-text-input"
                    value="{{ old('city') }}">

                <label for="state" class="std-form-label">País
                    abreviat</label>
                <input type="text" name="state" id="" placeholder="Espanya" class="std-form-text-input"
                    {{ old('state') }}>

                <label for="stadium_name" class="std-form-label">Nom de l'estadi de l'equip
                </label>
                <input type="text" name="stadium_name" id="" placeholder="Camp Nou" class="std-form-text-input"
                    {{ old('stadium_name') }}>

                @if ($team == null)
                    <input type="submit" value="Crea la localització" class="green-pill-btn w-full mt-4">
                @else
                    <input type="submit" value="Crea la localització i assigna-la a l'equip" class="green-pill-btn w-full mt-4">
                @endif
            </form>

        </div>

    </div>
@endsection
