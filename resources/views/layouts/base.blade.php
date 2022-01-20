<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Tailwind-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>MatchMaker</title>
</head>

<body class="bg-green-100">
    <header class="w-full max-w-5xl mx-auto mt-2">
        <div class="rounded-tr-lg rounded-tl-lg bg-green-900 text-white text-3xl p-2 font-rubik flex flex-nowrap justify-between">
            <p><span
                    class="material-icons text-5xl p-2 align-middle">
                    sports_soccer
                </span>MatchMaker</p>
                <a href="{{url('/')}}" class="text-base p-2 align-middle gold-pill-btn"><span class="material-icons text-sm align-middle pr-1">
                    dashboard
                    </span>Dashboard</a>
                
        </div>
    </header>
    <div class="w-full max-w-5xl mx-auto rounded-br-lg rounded-bl-lg mt-0 p-2 shadow bg-white">
        <div class="w-full font-rubik text-green-900 text-2xl p-2">
            @yield('page-title')
        </div>
        <div class="w-full mx-auto p-2">
            @yield('content')
        </div>
    </div>
   

    
</body>

</html>
