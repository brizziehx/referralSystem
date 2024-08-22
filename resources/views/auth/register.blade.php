<x-guestLayout>
    <div class="w-form_width bg-white p-3 px-4 rounded-md border border-gray-200">
        <h1 class="text-xl font-bold mb-3">Register</h1>
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div>
                <span class="text-sm">Fullname</span>
                <input type="text" name="fullname" class="input" value="{{ old('fullname') }}">
                @error('fullname')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <span class="text-sm">Email Address</span>
                <input type="email" name="email" class="input" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <span class="text-sm">Password</span>
                <input type="password" name="password" class="input" value="{{ old('password') }}">
                @error('password')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <span class="text-sm">Confirm Password</span>
                <input type="password" name="password_confirmation" class="input" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <span class="text-sm">Referral Code <span class="text-gray-400">(Optional)</span></span>
                <input type="text" name="referral_code" class="input" value="{{ old('referral') }}">
                @error('referral')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-3">
                <button class="block w-fit p-2 rounded-md text-white bg-blue-900 hover:bg-blue-950 transition-all outline-0 border-0 mt-1">Register</button>
            </div>

            <p class="text-md text-green-600 mt-2">
                @if(session('success'))
                    {{ session('success') }}
                @endif 
            </p>
        </form>
    </div>
</x-guestLayout>