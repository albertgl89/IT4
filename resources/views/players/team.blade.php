@extends('layouts.players')
@php
    use App\Models\Player;
    use App\Models\Team;
@endphp
@section('content')
    <!--Main-->
    <main class="bg-white-300 w-full p-3 overflow-hidden">

        <div class="flex flex-col">
            <x-twa-new-button :team="$team"/>
            {{$players = Player::where('team_id', $team->id)->paginate(6)}}
            <!--Profile Tabs-->
            <div
                class="grid grid-flow-row md:grid-cols-3 gap-2 mx-2 p-1 mt-2 mx-auto lg:mx-2 md:mx-2 justify-between md:w-lg">
                
                @forelse ($players as $player)
                    <x-twa-profile-card :player="$player" :team="$team" />
                @empty
                    <p>No hi ha jugadors en aquest equip encara.</p>
                @endforelse

                <!--/Profile Tabs-->
            </div>
    </main>
    <!--/Main-->
@endsection