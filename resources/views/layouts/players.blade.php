<!DOCTYPE html>
<html lang="en">
@php
use App\Models\Team;
use App\Models\Player;
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tailwindadmin-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwindadmin-all.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Player management</title>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            <header class="bg-nav">
                <div class="flex justify-between">
                    <div class="p-1 mx-3 inline-flex items-center">
                        <a href="{{ url('/dashboard') }}"><span
                                class="material-icons pr-2 text-white align-middle">arrow_back</span></a>
                        <h1 class="text-white p-2">Dashboard</h1>
                    </div>
                </div>
            </header>
            <!--/Header-->

            <div class="grid grid-flow-row md:grid-flow-col">
                <!--Sidebar-->
                <aside id="sidebar" class="bg-side-nav w-full h-fit md:h-screen border-r border-side-nav overflow-auto">
                    <ul class="list-reset flex flex-row md:flex-col">
                        @foreach (Team::all() as $team)
                            <li class="w-fit md:w-full h-full py-3 px-2 border-b border-light-border">
                                <a href="{{ url('players/' . $team->id) }}"
                                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline truncate">
                                    <span
                                        class="material-icons pr-2 text-black align-middle">group</span>{{ $team->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </aside>
                <!--/Sidebar-->

                @yield('content')
                
            </div>
            <!--Footer-->
            <footer class="bg-grey-darkest text-white p-2">
                <div class="flex flex-1 mx-auto">&copy; 2022 MatchMaker</div>
            </footer>
            <!--/footer-->

        </div>

    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
</body>

</html>
