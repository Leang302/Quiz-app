<x-layout>
    <center>
        <div class="w-screen p-5 h-fit">
        <form action="/edit-profile" method="POST" class="border border-gray-300 w-[30%] p-4 flex flex-col gap-5" enctype="multipart/form-data">
            @csrf
            <p class="font-bold text-2xl">Edit profile</p>
            <input type="file" name="avatar" id="">
    
            <button class="px-5 py-2 bg-green-400 text-white">Add</button>
        </form>
        </div>
       </center>
</x-layout>