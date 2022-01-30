@extends('layouts.base')

@php
use App\Models\Location;
@endphp

@section('page-title', 'Eliminar localització')


@section('content')
    <div class="grid grid-flow-row w-full mt-2 font-heebo">

        <div class="w-3/4 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full">
                    <a href="{{url('locations')}}" class="gold-pill-btn m-2 align-middle"><span class="material-icons text-xl align-middle">
                        arrow_back
                        </span>Torna</a>
                </p>
            </div>

            <div class="grid grid-flow-row gap-1 justify-items-center text-left items-center p-2">
                
                <div class="rounded-lg bg-red-700 text-white p-2">
                    <p class="font-bold text-lg align-middle"><span class="material-icons text-xl align-middle p-2 m-1">
                        warning
                        </span>Atenció!</p>
                        <p>Estàs segur que vols eliminar la següent localització?</p>
                        <p>Estàs a punt de realitzar una acció irreversible.</p>                        
                        <p>Els equips amb aquesta ubicació <b>deixaran de tenir-la associada.</b></p>
                        <p>Els partits pendents de cel·lebrar-se en aquesta ubicació <b>deixaran de tenir-la associada.</b></p>
                        <p>Els partits celebrats en aquesta ubicació <b>no es veuran afectats.</b></p>
                </div>
                
                <p class="text-xl text-green-900 font-rubik"><span class="material-icons text-xl align-middle p-1">
                    place
                    </span>{{$location->stadium_name}}</p>
                <p>{{$location->city}}, {{$location->state}}</p>
                <p>Equips amb base en aquest estadi: </p>
                <ul>

                    @forelse ($location->teams()->get() as $team)
                        <li class="mt-2 mb-4"><a href="{{url('teams', [$team->id])}}" class="green-pill-btn w-fit text-center"><span class="material-icons text-xl align-middle p-1">
                            group
                            </span>{{$team->name}}</a></li> 
                    @empty
                        No hi ha cap equip amb base en aquest estadi encara.
                    @endforelse
                    
                </ul>
                <p>Estadis a la mateixa ciutat: </p>
                <ul>
                    @if (Location::where('city', $location->city)->count() <= 1)
                        No hi ha cap altre estadi en aquesta mateixa ciutat.
                    @else
                        @foreach (Location::where('city', $location->city)->where('id','!=', $location->id)->get() as $loc)
                            
                            <li class="mt-2 mb-4"><a href="{{url('locations', [$loc->id])}}" class="green-pill-btn w-fit text-center"><span class="material-icons text-xl align-middle p-1">place</span>{{$loc->stadium_name}}</a></li> 
                                                
                        @endforeach
                    @endif
                </ul>
                <p class="list-item-bg md:grid-cols-none grid-rows-none text-center w-3/4 mt-2 mb-2">Total de partits disputats en aquest estadi: {{$location->matches()->get()->count()}}</p>
            </div>

            <form action="{{url('locations/'.$location->id.'/delete')}}" method="post" class="std-form">
            @csrf
            @method('delete')
            <input type="submit" value="Esborra la localització" class="red-pill-btn">
            <a class="gold-pill-btn text-center align-middle" href="{{url('locations')}}">Cancel·la</a>
            </form>
      

        </div>

    </div>
@endsection
