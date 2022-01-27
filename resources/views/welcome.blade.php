@extends('layouts.base')

@section('page-title', 'Dashboard')


@section('content')
    <div class="grid grid-flow-row md:grid-flow-col gap-2 w-full mt-2 font-heebo">

        <div class="">
            <div class="w-full mx-auto">
                <p class="p-2 rounded-tl-md bg-indigo-900 text-white w-full"><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                    groups
                    </span>Gestió d'equips</p>
            </div>

            <div class="rounded-br-lg grid grid-flow-row gap-2  shadow-md p-2 bg-white">
                <a href="{{url('teams')}}" class="green-pill-btn"><span class="material-icons text-xl align-top pr-2">
                    list_alt
                    </span>Mostra equips</a>
                <a href="{{url('teams/add')}}" class="green-pill-btn"><span class="material-icons text-xl align-top pr-2">
                    add_circle
                    </span>Crea equip</a>
            </div>
        </div>
        
        <div>
            <div class="w-full mx-auto">
                <p class="p-2 rounded-tl-md bg-indigo-900 text-white w-full"><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                    sports_soccer
                    </span>Gestió de partits</p>
            </div>
            <div class="rounded-br-lg grid grid-flow-row gap-2 shadow-md p-2 bg-white">
                <a href="{{url('matches')}}" class="green-pill-btn"><span class="material-icons text-xl align-top pr-2">
                    list_alt
                    </span>Mostra partits</a>
                <a href="{{url('matches/add')}}" class="green-pill-btn"><span class="material-icons text-xl align-top pr-2">
                    add_circle
                    </span>Crea partit</a>
                <a href="{{url('results/selectmatch')}}" class="green-pill-btn"><span class="material-icons text-xl align-top pr-2">
                    emoji_events
                    </span>Registra un resultat</a>
            </div>
        </div>

       <div>
        <div class="w-full mx-auto">
            <p class="p-2 rounded-tl-md bg-indigo-900 text-white w-full"><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                place
                </span>Gestió de localitzacions</p>
        </div>

        <div class="rounded-br-lg grid grid-flow-row gap-2 shadow-md p-2 bg-white">
            <a href="{{url('locations')}}" class="green-pill-btn"><span class="material-icons text-xl align-top pr-2">
                list_alt
                </span>Mostra localitzacions</a>
            <a href="{{url('locations/add')}}" class="green-pill-btn"><span class="material-icons text-xl align-top pr-2">
                add_circle
                </span>Crea localització</a>
        </div>

       </div>

        
    </div>
@endsection
