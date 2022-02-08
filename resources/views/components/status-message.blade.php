<div x-data="{show: true}"
x-show="show" 
x-init="setTimeout(()=> {show = false;},4000)"
x-transition.opacity.duration.1000ms
class="w-screen font-heebo fixed inset-x-0 bottom-0">
    @if (session('status'))
        <div class="bg-green-700 text-white p-2 w-full mx-auto text-center font-heebo sticky inset-x-0 bottom-0">
            {{ session('status') }}
        </div>
    @endif
    @if (session('unauth'))
        <div class="bg-red-700 text-white p-2 w-full mx-auto text-center font-heebo sticky inset-x-0 bottom-0">
            {{ session('unauth') }}
        </div>
    @endif
</div>