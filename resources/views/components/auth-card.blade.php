<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-fixed bg-gradient-to-br from-purple-400 via-teal-600 to-indigo-400">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden md:rounded-tl-xl md:rounded-br-xl">
        {{ $slot }}
    </div>
</div>
