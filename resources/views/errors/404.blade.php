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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>MatchMaker</title>
</head>

<body class="bg-fixed bg-gradient-to-br from-purple-400 via-teal-600 to-indigo-400 h-screen grid grid-flow-row justify-center content-center gap-2">
    <div class="mx-auto my-auto">
        <x-application-logo/>
    </div>
    <div class="mx-auto my-auto p-4 text-justify w-full md:max-w-xl bg-white md:rounded-md shadow">
        <p class="font-bold">Pàgina no trobada! :-( </p>
        <p>Pots tornar enrere en el navegador o fer clic <a class="std-link"
                href="{{ url('dashboard') }}">aquí</a> per tornar al dashboard.</p>
    </div>
</body>

</html>
