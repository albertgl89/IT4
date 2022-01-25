@extends('layouts.base')

@php
use App\Models\Location;
use App\Models\Team;
@endphp

@section('page-title', 'Detall de l\'equip')


@section('content')
    <div class="grid grid-flow-row w-full mt-2">

        <div class="w-3/4 mx-auto rounded-lg grid grid-flow-row shadow border-2 pb-2">

            <div class="mb-2 w-full -m-1 mx-auto">
                <p class="p-2 rounded-t-lg bg-indigo-900 text-white w-full">
                    <a href="@php return back(); @endphp" class="gold-pill-btn"><span class="material-icons text-xl align-middle">
                        arrow_back
                        </span>Torna</a>
                </p>
            </div>
//TODO
      

        </div>

    </div>
@endsection
