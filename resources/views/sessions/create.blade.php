<x-layout>
    <main class="max-w-lg mx-auto mt-10 lg:mt-20 bg-gray-100 rounded-xl
    border border-gray-200 space-y-6 p-4">
        <form method="POST" action="/login">
            @csrf
            <H2 class="text-center font-bold">Login!</H2>


            <div>
                <label for="email" class="block text-gray-800 font-bold">Email:</label>
                <input type="email" value="{{old('email')}}" name="email" id="email" placeholder="@email" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2
                outline-none focus:ring-indigo-600 :ring-indigo-600" />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-800 font-bold">Password:</label>
                <input type="password" name="password" id="password" placeholder="password"
                       class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">

                <button class="bg-blue-400 text-white rounded px-4 py-2 hover:bg-blue-500" type="submit">
                    submit
                </button>
            </div>

        </form>
    </main>
</x-layout>
