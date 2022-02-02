@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Team;
@endphp

@section('page-title', 'Editar localització')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-br-xl rounded-tl-xl bg-white grid grid-flow-row shadow pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full">Modifica els camps necessaris</p>
            </div>

            @if ($errors->any())
                <div class="rounded-xl bg-red-800 text-white p-2 w-3/4 mx-auto">
                    <p>Atenció! S'han trobat els errors següents:</p>
                    <ul class="bg-white/50 text-black rounded-lg shadow p-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{url('locations/'.$location->id.'/edit')}}" method="post" class="std-form">
                @csrf
                @method('put')

                <label for="city" class="std-form-label">Ciutat</label>
                <input type="text" name="city" id="" placeholder="Barcelona" class="std-form-text-input"
                    value="{{ $location->city }}">

                <label for="state" class="std-form-label">País
                    </label>
                <input type="text" name="state" id="" placeholder="Espanya" class="std-form-text-input"
                    value="{{ $location->state }}">

                <label for="stadium_name" class="std-form-label">Nom de l'estadi de l'equip
                </label>
                <input type="text" name="stadium_name" id="" placeholder="Camp Nou" class="std-form-text-input"
                    value="{{ $location->stadium_name }}">

                
                <input type="submit" value="Actualitza les dades" class="green-pill-btn w-full mt-4">
                
            </form>

        </div>

    </div>
@endsection
