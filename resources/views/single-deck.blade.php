<x-layout>
   <div class="w-screen p-5">
        <div class="flex gap-3">
            <h2 class="px-5 py-2 bg-sky-400 w-36 text-center text-white font-bold">{{$deckName}}</h2>
            <a href="/add-card/{{$id}}" class="px-3 py-1 bg-green-400 text-white w-24 text-center">Add card</a>
            <a href="#" class="px-3 py-1 bg-green-400 w-24 text-white text-center">Learn</a>
        </div>
        <div class="grid grid-cols-5">
            @foreach ($cards as $card)
            <a class="px-5 py-5 bg-gray-200 hover:cursor-pointer m-2 h-60 flex justify-center items-center" href="#">
                <div>
                    <p class="font-bold text-lg">{{$card->question}}</p>
                    <p class="pt-5">Subject: {{$card->answer}}</p>
                </div>
            </a>
            @endforeach
        </div>
      
   </div>
</x-layout>