<!--Top user 1-->
<div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
    <img src="https://i.imgur.com/w1Bdydo.jpg" alt="" class="w-full"/>
    <div class="flex justify-center -mt-8">
        <img src="https://i.imgur.com/8Km9tLL.jpg" alt=""
             class="rounded-full border-solid border-white border-2 -mt-3">
    </div>
    <div class="text-center px-3 pb-6 pt-2">
        <h3 class="text-black text-sm bold font-sans">{{$player->name." ".$player->surname}}</h3>
        <p class="mt-2 font-sans font-light text-grey-700">{{$team->name}}</p>
    </div>
    <div class="flex justify-center pb-3 text-grey-dark">
        <x-twa-edit-delete :player="$player"/>
    </div>
</div>