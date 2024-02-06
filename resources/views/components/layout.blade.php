<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col justify-between">
    {{-- header --}}
    <div class="w-full bg-sky-500 flex flex-row justify-between items-center py-3 px-[10%] sticky top-0 left-0">
        <a href="#" class="no-underline text-white text-2xl">QUIZIZ</a>
            {{-- <form action="#" class="flex gap-x-2">
                <input type="text" name="name" id="" placeholder="Name" class="rounded px-2 py-1">
                <input type="text" name="password" id="" placeholder="Password" class="rounded px-2 py-1">
                <button class="py-1 px-3 text-white bg-green-600 rounded">Sign In</button>

            </form> --}}
        <div class="flex gap-x-3">
                <img src="{{asset('assets/img/Screenshot 2024-02-05 at 1.05.35 in the afternoon.png')}}" alt="" class=" rounded-full w-11 h-11">
                <button class="py-1 px-3 text-white bg-red-600 rounded ">Sign Out</button>

            </div>
    </div>
    {{-- end header --}}
   {{$slot}}
    {{-- footer --}}
    <div class="w-full shadow-inner flex flex-col items-center py-11">
        <p>© ABC Corporation 2024. All rights reserved.</p>
    </div>
</body>
</html>