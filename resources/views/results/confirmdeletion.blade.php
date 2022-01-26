@extends('layouts.base')

@php
use App\Models\Location;
@endphp

@section('page-title', 'Eliminar resultat')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-lg grid grid-flow-row shadow border-2 pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">
                    <a href="{{url('matches/'.$matchResult->match()->first()->id)}}" class="gold-pill-btn m-2 align-middle"><span class="material-icons text-xl align-middle">
                        arrow_back
                        </span>Torna</a>
                </p>
            </div>

            <div class="grid grid-flow-row gap-1 justify-items-center text-left items-center p-2">

            <form action="{{url('results/'.$matchResult->id.'/delete')}}" method="post" class="std-form">
            @csrf
            @method('delete')
            <div class="rounded-lg bg-red-700 text-white p-2">
                <p class="font-bold text-lg align-middle"><span class="material-icons text-xl align-middle p-2 m-1">
                    warning
                    </span>Atenció!</p>
                    <p>Estàs segur que vols eliminar el resultat d'aquest partit?</p>
                    <p>Estàs a punt de realitzar una acció irreversible.</p>                        
                    <p>Hauràs de registrar un nou resultat novament en el futur.</p>
            </div>
            <input type="submit" value="Esborra el resultat" class="red-pill-btn">
            <a class="gold-pill-btn text-center align-middle" href="{{url('matches/'.$matchResult->match()->first()->id)}}">Cancel·la</a>
            </form>
      

        </div>

    </div>
@endsection
