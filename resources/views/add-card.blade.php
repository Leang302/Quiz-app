<x-layout>
   <center>
    <div class="w-screen p-5 h-fit">
        <h2 class="px-5 py-2 bg-sky-400 w-36 text-center text-white font-bold"> {{$deck->deck_name}}</h2><br>
   
    <form action="/add-card/{{$deck['id']}}" method="POST" class="border border-gray-300 w-[30%] p-4 flex flex-col gap-5">
        @csrf
        <p class="font-bold text-2xl">Add Card</p>
        <input value="{{old('question',null)}}" class="px-5 py-2 border border-gray-200" name="question" type="text" class="border border-black" placeholder="Question">
        @error('question')
        <p class="px-5 py-2 bg-red-200">{{$message}}</p>
        @enderror
        <input value="{{old('answer',null)}}" class="px-5 py-2 border border-gray-200" name="answer" type="text" class="border border-black" placeholder="Answer">
        @error('answer')
        <p class="px-5 py-2 bg-red-200">{{$message}}</p>
        @enderror
        <button class="px-5 py-2 bg-green-400 text-white">Add</button>
    </form>
    </div>
   </center>
</x-layout>