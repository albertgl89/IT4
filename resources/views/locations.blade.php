@extends('layouts.base')
@php
use App\Models\Location;
@endphp

@section('page-title', 'Localitzacions')


@section('content')
    <p>Llistat de totes les localitzacions del sistema</p>

    <div class="grid grid-flow-col w-full mt-2">

        @if (session('status'))
            <div class="rounded-xl bg-green-700 text-white font-bold p-2 w-3/4 mx-auto text-center">
                {{ session('status') }}
            </div>
        @endif

        @if (Location::all()->count() == 0)
                <div>
                    <p>No hi ha cap localització encara.</p>
                </div>
        @endif

        @foreach (Location::all() as $location)
            
            <div>
                <p>{{ $location->stadium_name }}</p>
            </div>

        @endforeach

    </div>

@endsection
