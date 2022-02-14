@extends('layouts.players')
@php
    use App\Models\Player;
    use App\Models\Team;
@endphp
@section('content')
    <!--Main-->
    <main class="bg-white-300 w-full p-3 overflow-hidden md:col-span-3">

        <div class="flex flex-col">
            <!-- Stats Row Starts Here -->
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                <div
                    class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-2/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            {{Team::all()->count()}}
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Equips
                        </a>
                    </div>
                </div>

                <div
                class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-2/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{Player::all()->count()}}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Jugadors
                    </a>
                </div>
            </div>

               
            </div>

            <!-- /Stats Row Ends Here -->




            <!--Profile Tabs-->
            <div
                class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 p-1 mt-2 mx-auto lg:mx-2 md:mx-2 justify-between items-center">

                <p class="mx-auto my-auto h-screen w-full align-middle">Sel·lecciona un equip per començar.</p>

                <!--/Profile Tabs-->
            </div>
    </main>
    <!--/Main-->
@endsection