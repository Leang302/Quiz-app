e
<x-layout>
    <div class="w-full flex justify-center items-center h-dv">
        <form action="/create-deck" method="POST" class="border p-10 border-black-400">
            @csrf
            <center><h3>ADD NEW DECK</h3></center><br>
            <div class="flex flex-col">
                <label for="deck_name">Deck Name</label>
                <input value="{{old('deck_name')}}" type="text" name="deck_name" id="" class="border rounded px-3 py-2" placeholder="Deck Name">
                @error('deck_name')
                    <p class="px-3 py-2 bg-red-200">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="subject">Subject</label>
                <input value="{{old('subject')}}" type="text" name="subject" id="" class="border rounded px-3 py-2" placeholder="Subject">
                @error('subject')
                <p class="px-3 py-2 bg-red-200">{{$message}}</p>
            @enderror
            </div><br>
            <button class="px-3 py-1 bg-green-500 text-white">ADD</button>
        </form>
    </div>
</x-layout>