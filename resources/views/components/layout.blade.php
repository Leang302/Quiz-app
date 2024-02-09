<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col justify-between h-screen">
    {{-- header --}}
    <div class="w-screen bg-sky-500 flex flex-row justify-between items-center py-3 px-[10%] sticky top-0 left-0">
        <div class="flex items-center gap-x-4">
            <a href="/" class="no-underline text-white text-2xl">QUIZIZ</a>
            @auth
                <ul class="flex gap-x-3">
                    <li class="text-lg text-white"><a href=""><span class="icon-[material-symbols--explore-outline] "></span>DISCOVER</a></li>
                    <li class="text-lg text-white"><a href="/create-deck"><span class="icon-[mingcute--pencil-line]"></span>CREATE</a></li>
                    <li class="text-lg text-white"><a href=""><span class="icon-[iconamoon--profile-fill]"></span>ME</a></li>

                </ul>
            @endauth
        </div>

        @auth
        <div class="flex gap-x-3">
            <img src="{{asset('assets/img/logo.png')}}" alt="" class=" rounded-full w-11 h-11">
           <form action="/log-out" method="POST">
            @csrf
            <button class="py-1 px-3 text-white bg-red-600 rounded ">Log Out</button>
           </form>
        </div>
        @else
            <form action="/log-in" class="flex gap-x-2" method="POST">
                @csrf
                <input type="text" name="loginname" id="" placeholder="Name" class="rounded px-2 py-1">
                <input type="password" name="loginpassword" id="" placeholder="Password" class="rounded px-2 py-1">
                <button class="py-1 px-3 text-white bg-green-600 rounded">Sign In</button>

            </form>
        @endauth
            
        
    </div>
    @if (session()->has('success'))
      <center>  <p class="px-3 py-1 bg-green-200 w-[50%]">{{session('success')}}</p></center>
    @endif
    @if (session()->has('failure'))
        <p class="px-3 py-1 bg-red-200">{{session('failure')}}</p>
    @endif
    {{-- end header --}}
   <div>{{$slot}}</div>
    {{-- footer --}}
    <div class="w-full shadow-inner flex flex-col items-center py-11">
        <p>© ABC Corporation 2024. All rights reserved.</p>
    </div>
</body>
</html>