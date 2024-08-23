<x-guestLayout>
    <div class="w-form_width bg-white p-3 px-4 rounded-md border border-gray-200">
        <h1 class="text-xl font-bold mb-3">Login</h1>
        <form action="{{ route('auth.login') }}" method="post">
            @csrf
            <div class="mt-2">
                <span class="text-sm">Email Address</span>
                <input type="text" name="email" class="input @error('email') ring-red-500 focus:ring-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <span class="text-sm">Password</span>
                <input type="password" name="password" class="input @error('password') ring-red-500 focus:ring-red-500 @enderror" value="{{ old('password') }}">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-3">
                <button class="block w-fit p-2 rounded-md text-white bg-blue-900 hover:bg-blue-950 transition-all outline-0 border-0 mt-1">Login</button>
            </div>

            <p class="text-md text-green-600 mt-2">
                @if(session('success'))
                {{ session('success') }}
                @endif 
            </p>
            @error('message')
                <span class="text-red-500 text-sm block mb-2">{{ $message }}</span>
            @enderror

            <p class="mt-3 block text-center">Don't have an accoun't!? Register <a href="{{ route('auth.register') }}" class="text-red-500">here</a></p>
        </form>
    </div>
</x-guestLayout>