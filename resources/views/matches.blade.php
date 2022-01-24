@extends('layouts.base')
@php
use App\Models\Match;
@endphp
@section('page-title', 'Partits')


@section('content')
    <p>Llistat de tots els partits del sistema</p>
    <div class="grid grid-flow-col w-full mt-2">
        
        @if (Match::all()->count() == 0)
            <div>
                <p>No hi ha cap partit encara.</p>
            </div>
        @endif

        @foreach (Match::all() as $match)

            <div>
                <p>{{ $match->match_date }}</p>
            </div>
        @endforeach

    </div>
@endsection