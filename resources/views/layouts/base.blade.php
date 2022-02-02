<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Tailwind-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>MatchMaker</title>
</head>

<body class="bg-fixed bg-gradient-to-br from-purple-400 via-teal-600 to-indigo-400">
    <header class="w-full max-w-5xl mx-auto mt-2">
        <div
            class="rounded-tr-lg rounded-tl-lg bg-green-900 text-white text-3xl p-2 font-rubik flex flex-nowrap justify-between">
            <div class="flex flex-nowrap">
                <div class="hidden md:inline my-auto m-1">
                    <span class=" material-icons text-lg md:text-5xl">
                        sports_soccer
                    </span>
                </div>
                <p class="my-auto mr-2 text-lg md:text-3xl">MatchMaker</p>
            </div>

            <div class="grid grid-flow-col gap-1">
                <a href="{{ url('/') }}"
                    class="md:inline hidden text-base p-2 align-middle gold-pill-btn h-fit w-fit"><span
                        class="material-icons text-sm align-middle">
                        dashboard
                    </span>Dashboard</a>
                <a href="{{ url('/') }}" class="inline md:hidden text-base p-2 align-middle gold-pill-btn"><span
                        class="material-icons text-sm align-middle text-center">
                        dashboard
                    </span></a>
                <a href="{{ url('teams') }}"
                    class="md:inline hidden text-base p-2 align-middle gold-pill-btn h-fit w-fit"><span
                        class="material-icons text-sm align-middle">
                        group
                    </span>Equips</a>
                <a href="{{ url('teams') }}" class="inline md:hidden text-base p-2 align-middle gold-pill-btn"><span
                        class="material-icons text-sm align-middle text-center">
                        group
                    </span></a>
                <a href="{{ url('matches') }}"
                    class="md:inline hidden text-base p-2 align-middle gold-pill-btn h-fit w-fit"><span
                        class="material-icons text-sm align-middle">
                        sports_soccer
                    </span>Partits</a>
                <a href="{{ url('matches') }}" class="inline md:hidden text-base p-2 align-middle gold-pill-btn"><span
                        class="material-icons text-sm align-middle text-center">
                        sports_soccer
                    </span></a>
                <a href="{{ url('locations') }}"
                    class="md:inline hidden text-base p-2 align-middle gold-pill-btn h-fit w-fit"><span
                        class="material-icons text-sm align-middle">
                        place
                    </span>Localitzacions</a>
                <a href="{{ url('locations') }}"
                    class="inline md:hidden text-base p-2 align-middle gold-pill-btn"><span
                        class="material-icons text-sm align-middle text-center">
                        place
                    </span></a>
            </div>


        </div>
    </header>
    <div class="w-full max-w-5xl mx-auto rounded-br-lg rounded-bl-lg mt-0 p-2 shadow bg-slate-300">
        <div class="w-full font-rubik text-green-900 text-2xl p-2 flex flex-nowrap justify-start">
            @yield('page-title')
        </div>
        @yield('actions')
        <div class="w-full mx-auto p-2">
            @yield('content')
        </div>
    </div>



</body>

</html>
