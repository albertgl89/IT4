@extends('layouts.base')

@php
use App\Models\Location;
@endphp

@section('page-title', 'Afegir nou equip')

@section('content')
    <div class="grid grid-flow-row w-full mt-2 font-heebo">

        <div class="w-full lg:w-3/4 mx-auto rounded-br-xl rounded-tl-xl grid grid-flow-row shadow bg-white pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-tl-xl bg-indigo-900 text-white w-full"><span class="material-icons text-xl align-top pr-2 pl-2 rounded-full text-center mx-auto mr-2 bg-white text-indigo-900">
                    add_circle
                    </span>Emplena tots els camps amb la informació
                    necessària</p>
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

            <form action="{{url('teams/add')}}" method="post" class="std-form">
                @csrf
                <label for="name" class="std-form-label">Nom complet de l'equip</label>
                <input type="text" name="name" id="" placeholder="París St. Germain"
                    class="std-form-text-input" value="{{ old('name') }}">

                <label for="short_name" class="std-form-label">Nom
                    abreviat</label>
                <input type="text" name="short_name" id="" placeholder="PSG"
                    class="std-form-text-input" value="{{ old('short_name') }}">

                <label for="city" class="std-form-label">Assigna una
                    localització a l'equip, o crea'n una de nova al següent pas</label>
                <select name="city" id=""
                    class="std-form-selector">
                    <option value="null" class="text-indigo-600 ">Crea una nova localització...</option>
                    @foreach (Location::all() as $city)
                        <option value="{{ $city->id }}" class="text-indigo-600" @if (old('city') == $city->id) selected @endif>
                            {{ $city->city . ', ' . $city->state . ' (' . $city->stadium_name . ')' }}</option>
                    @endforeach
                </select>
                <input type="submit" value="Crea l'equip" class="green-pill-btn w-full mt-4">
            </form>

        </div>

    </div>
@endsection
