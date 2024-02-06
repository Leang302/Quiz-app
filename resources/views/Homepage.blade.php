<x-layout>
    <div class="flex justify-center gap-x-3 w-full m-5 items-center">
            <img src="{{asset("assets/img/logo.png")}}" alt="">
            <form action="/register" class="flex flex-col gap-y-6 p-12 border border-black-100 items-start" method="POST">
                @csrf
                <input value="{{old('name')}}" type="text" name="name" id="" placeholder="Username" class="border px-3 py-1 rounded w-96">
                @error('name')
                    <p class="px-3 py-1 rounded w-96 bg-red-200">{{$message}}</p>
                @enderror

                <input value="{{old('email')}}" type="text" name="email" id="" placeholder="Email" class="border px-3 py-1 rounded w-96">
                @error('email')
                    <p class="px-3 py-1 rounded w-96 bg-red-200">{{$message}}</p>
                @enderror

                <input type="password" name="password" id="" placeholder="Password" class="border px-3 py-1 rounded w-96">
                @error('password')
                    <p class="px-3 py-1 rounded w-96 bg-red-200">{{$message}}</p>
                @enderror

                <input type="password" name="password_confirmation" id="" placeholder="Confirm Password" class="border px-3 py-1 rounded w-96">
                @error('password_confirmation')
                    <p class="px-3 py-1 rounded w-96 bg-red-200">{{$message}}</p>
                @enderror
                <button class="rounded p-3 bg-green-500 text-white">Register</button>
            </form>
    </div>
</x-layout>