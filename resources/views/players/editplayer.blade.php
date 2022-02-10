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
                        Editar jugador {{ $player->name . ' ' . $player->surname }}
                    </div>
                    <div class="p-3">
                        <form class="w-full" method="post" action="{{ url('players/' . $player->id . '/edit') }}">
                            @csrf
                            @method('put')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                        for="grid-first-name">
                                        Nom
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                        id="grid-first-name" name="name" type="text" placeholder="Samuel"
                                        value="{{ $player->name }}">
                                    <p class="text-red-500 text-xs italic">Sisplau emplena aquest camp.</p>
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                        for="grid-last-name">
                                        Cognom
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                        id="grid-last-name" name="surname" type="text" placeholder="Eto'o"
                                        value="{{ $player->surname }}">
                                    <p class="text-red-500 text-xs italic">Sisplau emplena aquest camp.</p>
                                </div>
                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                        for="grid-team">
                                        Equip
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                            id="grid-team" name="team_id">
                                            @forelse (Team::all() as $team)
                                                <option value="{{ $team->id }}" @if ($team->id == $player->team_id) selected @endif>
                                                    {{ $team->name }}</option>
                                            @empty
                                                <p>No hi ha equips encara.</p>
                                            @endforelse
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="m-2 ml-0">
                                <x-twa-edit-button/>
                            </button>
                            <x-twa-cancel-button :team="Team::find($player->team_id)" />

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
