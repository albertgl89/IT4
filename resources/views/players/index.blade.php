@extends('layouts.players')
@php
    use App\Models\Player;
    use App\Models\Team;
@endphp
@section('content')
    <!--Main-->
    <main class="bg-white-300 w-full p-3 overflow-hidden">

        <div class="flex flex-col">
            <!-- Stats Row Starts Here -->
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                <div
                    class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            $244
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Total Sales
                        </a>
                    </div>
                </div>

                <div
                    class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            $199.4
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Total Cost
                        </a>
                    </div>
                </div>

                <div
                    class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            900
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Total Users
                        </a>
                    </div>
                </div>

                <div
                    class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                    <div class="p-4 flex flex-col">
                        <a href="#" class="no-underline text-white text-2xl">
                            500
                        </a>
                        <a href="#" class="no-underline text-white text-lg">
                            Total Products
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