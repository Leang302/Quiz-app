<x-layout>
    <div class='w-screen h-dvh p-5'>
        <h2 class="px-5 py-2 bg-sky-400 w-36 text-center text-white font-bold">Decks</h2>
        <div class="flex p-5">
        @foreach ($decks as $deck)
        <a class="px-5 py-5 bg-gray-200 w-[10%] h-[10%] hover:cursor-pointer m-2 block" href="/deck/{{$deck->id}}">
            <div>
                <p class="font-bold text-lg">{{$deck->deck_name}}</p>
                <p class="pt-5">Subject: {{$deck->subject}}</p>
            </div>
        </a>
        @endforeach
    </div>
    </div>
</x-layout>