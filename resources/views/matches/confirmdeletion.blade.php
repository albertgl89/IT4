@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Match;
@endphp

@section('page-title', 'Eliminar partit')


@section('content')
    <div class="grid grid-flow-row w-full mt-2 font-heebo">

        <div class="w-3/4 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full">
                    <a href="{{url('matches')}}" class="gold-pill-btn m-2 align-middle"><span class="material-icons text-xl align-middle">
                        arrow_back
                        </span>Torna</a>
                </p>
            </div>

            <div class="grid grid-flow-row gap-1 justify-items-center text-left items-center p-2">
                
                <div class="rounded-lg bg-red-700 text-white p-2 mb-2">
                    <p class="font-bold text-lg align-middle"><span class="material-icons text-xl align-middle p-2 m-1">
                        warning
                        </span>Atenció!</p>
                        <p>Estàs segur que vols eliminar el següent partit?</p>
                        <p>Estàs a punt de realitzar una acció irreversible.</p>                        
                        <p>Els equips i ubicacions relacionats amb aquest partit en el passat <b>no</b> es veuran afectats.</p>
                </div>

                <div class="grid grid-flow-row text-left gap-1 mb-2">
                    <p><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                        event
                        </span>{{$match->getDate()}}</p>
                    <p><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                        place
                        </span>{{$match->location()->withTrashed()->first()->stadium_name}} ({{$match->location()->withTrashed()->first()->city}}, {{$match->location()->withTrashed()->first()->state}})</p>
                    <p><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                        group
                        </span>{{$match->team1()->withTrashed()->first()->name}} vs {{$match->team2()->withTrashed()->first()->name}}</p>
                    
                    @if ($match->match_result_id == null)
                        <p class="justify-self-center mx-auto rounded-lg bg-red-900 text-white p-2 w-full text-center">Pendent del resultat</p>
                    @elseif ($match->results()->withTrashed()->first()->tie == true)
                            <ul class="grid grid-flow-row gap-1 text-center">
                                <li class="list-item-bg md:grid-cols-none grid-rows-none">{{$match->team1()->withTrashed()->first()->name}} - {{$match->results()->withTrashed()->first()->goals_team1}}</li>
                                <li class="list-item-bg md:grid-cols-none grid-rows-none">{{$match->team2()->withTrashed()->first()->name}} - {{$match->results()->withTrashed()->first()->goals_team2}}</li>
                            </ul>
                    @else 
                        <ul class="grid grid-flow-row gap-1 text-center">
                            <li class="list-item-bg md:grid-cols-none grid-rows-none">{{$match->team1()->withTrashed()->first()->name}}: {{$match->results()->withTrashed()->first()->goals_team1}}</li>
                            <li class="list-item-bg md:grid-cols-none grid-rows-none">{{$match->team2()->withTrashed()->first()->name}}: {{$match->results()->withTrashed()->first()->goals_team2}}</li>
                        </ul>
                    @endif
                </div>
                
                
            </div>

            <form action="{{url('matches/'.$match->id.'/delete')}}" method="post" class="std-form">
            @csrf
            @method('delete')
            <input type="submit" value="Esborra el partit" class="red-pill-btn">
            <a class="gold-pill-btn text-center align-middle" href="{{url('matches')}}">Cancel·la</a>
            </form>
      

        </div>

    </div>
@endsection
