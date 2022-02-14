@extends('layouts.base')
@php
use App\Models\Team;
$isAdmin = Auth::user()->hasRole('admin');
@endphp

@section('page-title', 'Equips')
@section('actions')
    <div class="grid grid-flow-row md:grid-flow-col text-base justify-start gap-1">
        @if ($isAdmin)
            <a href="{{ url('teams/add') }}" class="green-pill-btn w-fit mx-0 h-fit"><span
                    class="material-icons text-xl align-top pr-2">
                    add_circle
                </span>Crea equip</a>
            <a href="{{ url('players') }}" class="green-pill-btn w-fit mx-0 h-fit"><span
                    class="material-icons text-xl align-top pr-2">
                    group
                </span>Gestiona jugadors</a>
        @endif
    </div>
@endsection


@section('content')

    @if (Team::all()->count() == 0)
        <div>
            <p class="font-heebo font-bold text-center">No hi ha cap equip encara.</p>
        </div>
    @endif

    <div class="grid grid-flow-row md:grid-cols-4 gap-2 font-heebo w-full">
        @foreach (Team::all()->sortByDesc('asc') as $team)
            <div class="md:flex md:flex-wrap list-card-bg text-white md:w-full min-w-fit">
                <div
                    class="p-1 m-2 grid grid-cols-4 md:grid-cols-4 gap-1 md:items-center md:content-center justify-around w-full">

                    <p
                        class="md:col-span-2 font-rubik rounded-full p-4 bg-white text-green-900 m-1 w-min justify-self-center">
                        {{ $team->short_name }}</p>
                    <p
                        class="col-start-2 col-end-3 md:col-span-2 md:col-start-3 place-self-center justify-self-start md:mx-auto">
                        {{ $team->name }}</p>

                    <div
                        class="p-2 pb-0 mx-auto my-auto grid grid-flow-col md:flex md:flex-wrap justify-items-center content-center items-center gap-2 col-span-2 md:col-span-4 w-max md:w-full">

                        <a href="teams/{{ $team->id }}" class="gold-pill-btn w-fit md:w-full text-center">Detalls</a>
                        @if ($isAdmin)
                            <a href="{{ url('teams/' . $team->id . '/edit') }}"
                                class="sm:inline hidden w-1/3 md:flex-1 md:justify-self-stretch"><span
                                    class="material-icons text-xl gold-pill-btn md:w-full text-center">
                                    edit
                                </span></a>
                            <a href="{{ url('teams/' . $team->id . '/delete') }}"
                                class="sm:inline hidden w-1/3 md:flex-1 md:justify-self-stretch"><span
                                    class="material-icons text-xl red-pill-btn md:w-full text-center">
                                    delete
                                </span></a>
                        @endif
                    </div>

                </div>

            </div>

        @endforeach
    </div>


    </div>

@endsection

@section('messages')
    <x-status-message />
@endsection
