@extends('layouts.players')
@php
use App\Models\Player;
use App\Models\Team;
@endphp
@section('content')
    <!--Main-->
    <main class="bg-white-300 w-full p-3 overflow-hidden">

        <div class="flex flex-col w-full">
            <!--Profile Tabs-->
            <div class="grid grid-flow-row w-full gap-2 p-1 mt-2 mx-auto lg:mx-2 md:mx-2">
                <!-- Titled Alert -->
                <div role="alert" class="mb-2 w-full">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Atenció
                    </div>
                    <div class="border border-t-0 border-red-300 rounded-b bg-red-300 px-4 py-3 text-red-800">
                        <p>Estàs segur que vols eliminar aquest jugador? És una acció irreversible.</p>
                    </div>
                </div>
                <div class="grid grid-flow-row md:grid-flow-col place-items-center">
                    <x-twa-profile-card :player="Player::find($player->id)" :team="Team::find($player->team_id)" />
                    <form action="{{ url('players/' . $player->id . '/delete') }}" method="post" class="w-full mx-auto">
                        @csrf
                        @method('delete')
                        <button type="submit">
                            <x-twa-delete-button />
                        </button>
                    </form>
                </div>

                <!--/Profile Tabs-->
            </div>
    </main>
    <!--/Main-->
@endsection
