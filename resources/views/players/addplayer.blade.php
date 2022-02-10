@extends('layouts.players')
@php
use App\Models\Player;
use App\Models\Team;
@endphp
@section('content')
    <!--Main-->
    <main class="bg-white-300 w-full p-3 overflow-hidden">

        <div class="flex flex-col">
            
            <!--Grid Form-->

            <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2 my-2 w-full mx-auto">
                <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                    <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                        Afegir nou jugador a l'equip {{ $team->name }}
                    </div>
                    <div class="p-3">
                        <form class="w-full" method="post" action="{{ url('players/' . $team->id . '/add') }}">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                        for="grid-first-name">
                                        Nom
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                        id="grid-first-name" name="name" type="text" placeholder="Samuel">
                                    <p class="text-red-500 text-xs italic">Sisplau emplena aquest camp.</p>
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                        for="grid-last-name">
                                        Cognom
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                        id="grid-last-name" name="surname" type="text" placeholder="Eto'o">
                                    <p class="text-red-500 text-xs italic">Sisplau emplena aquest camp.</p>
                                </div>
                            </div>
                            <button type="submit" class="m-2 ml-0">
                                <a class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 border border-green-800 rounded">
                                    Nou jugador
                                </a>
                            </button>
                            <x-twa-cancel-button :team="$team" />
                            
                    </div>
                </div>
            </div>
            
            </form>
        </div>
        </div>
        </div>
        <!--/Grid Form-->
    </main>
    <!--/Main-->
@endsection
