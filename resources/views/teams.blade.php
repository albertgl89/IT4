@extends('layouts.base')
@php
use App\Models\Team;
@endphp

@section('page-title', 'Equips')


@section('content')
    <p>Llistat de tots els equips del sistema</p>

    <div class="grid grid-flow-col w-full mt-2">

        @if (session('status'))
            <div class="rounded-xl bg-green-700 text-white font-bold p-2 w-3/4 mx-auto text-center">
                {{ session('status') }}
            </div>
        @endif

        @foreach (Team::all() as $team)

            <div>
                <p>{{ $team->name }}</p>
            </div>

        @endforeach

    </div>

@endsection
