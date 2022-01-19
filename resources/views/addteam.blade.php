@extends('layouts.base')

@php
    use App\Models\Location;
@endphp

@section('page-title', 'Afegir nou equip')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-lg grid grid-flow-row shadow border-2 pb-2">
            
            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">Emplena tots els camps amb la informació necessària</p>
            </div>
            
            <form action="teams/add" method="post" class="mx-auto grid grid-cols-2 p-2">
                @method('PUT')
                @csrf
                <label for="name" class="p-2 m-2 mr-0 border border-t-0 border-l-0 border-b-indigo-900">Nom complet de l'equip</label>
                <input type="text" name="name" id="" placeholder="París St. Germain" class="p-2 m-2 ml-0 border border-b-indigo-900 text-indigo-600 hover:border-green-900 focus:outline-green-600 focus:outline-2">
                
                <label for="short_name" class="p-2 m-2 mr-0 border border-t-0 border-l-0 border-b-indigo-900 ">Nom abreviat</label>
                <input type="text" name="short_name" id="" placeholder="PSG" class="p-2 m-2 ml-0 border border-b-indigo-900 text-indigo-600 hover:border-green-900 focus:outline-green-600 focus:outline-2">
                
                <label for="city" class="p-2 m-2 mr-0 border border-t-0 border-l-0 border-b-indigo-900 ">Assigna una localització a l'equip, o crea'n una de nova al següent pas</label>
                <select name="city" id="" class="p-2 m-2 ml-0 border border-b-indigo-900 text-indigo-600 hover:border-green-900 focus:outline-green-600 focus:outline-2">
                    <option value="null" class="text-indigo-600 ">Crea una nova localització...</option>
                    @foreach (Location::all() as $city)
                        <option value="{{$city->id}}" class="text-indigo-600">{{$city->city.", ".$city->state ."(".$city->stadium_name.")"}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Crea l'equip" class="green-pill-btn col-span-2">
            </form>

        </div>
    
    </div>
@endsection
