@extends('layouts.base')
@php
use App\Models\Location;
$isAdmin = Auth::user()->hasRole('admin');
@endphp

@section('page-title', 'Localitzacions')
@section('actions')
    <div class="flex flex-nowrap text-base justify-items-start gap-2">
        @if ($isAdmin)
            <a href="{{ url('locations/add') }}" class="green-pill-btn w-fit mx-0 h-fit"><span
                    class="material-icons text-xl align-top pr-2">
                    add_circle
                </span>Crea localitzaci√≥</a>
        @endif
    </div>
@endsection


@section('content')

    <div class="grid grid-flow-col w-full mt-2">

        @if (Location::all()->count() == 0)
            <div>
                <p class="font-heebo font-bold text-center">No hi ha cap localitzaci√≥ encara.</p>
            </div>
        @endif

        <div class="grid grid-flow-row md:grid-cols-4 gap-2">
            @foreach (Location::all() as $location)

                <div
                    class="list-card-bg text-white min-w-fit max-w-1/4 p-2 m-2 grid grid-cols-2 md:grid-flow-row md:grid-cols-none gap-2 shadow-md md:items-center md:content-center justify-around font-heebo">

                    <div class="grid grid-flow-row justify-items-center items-center md:row-1 mt-2 mb-2">
                        <p class="font-rubik rounded-tr-xl p-2 text-center bg-white text-green-900 w-full">
                            {{ $location->stadium_name }}</p>
                        <p class="font-rubik justify-self-center bg-indigo-400 rounded-bl-xl p-2 w-full text-center">
                            {{ $location->city }}, {{ $location->state }}</p>
                    </div>

                    <div
                        class="grid grid-flow-col md:flex md:flex-wrap md:max-w-none max-w-[30%] justify-items-center content-center items-center gap-2 justify-self-center md:justify-self-auto">
                        <a href="locations/{{ $location->id }}"
                            class="gold-pill-btn w-fit md:w-full text-center">Detalls</a>
                        @if ($isAdmin)
                            <a href="{{ url('locations/' . $location->id . '/edit') }}"
                                class="sm:inline hidden md:justify-self-stretch md:flex-1 text-center"><span
                                    class="material-icons text-xl gold-pill-btn md:w-full">
                                    edit
                                </span></a>
                            <a href="{{ url('locations/' . $location->id . '/delete') }}"
                                class="sm:inline hidden md:justify-self-stretch md:flex-1 text-center"><span
                                    class="material-icons text-xl red-pill-btn md:w-full">
                                    delete
                                </span></a>
                        @endif
                    </div>
                </div>



            @endforeach
        </div>


    </div>
@endsection

@section('messages')
    <x-status-message />
@endsection
