<x-dashboard-layout>
    <div class="flex items-center">
        <a href="{{ route('dashboard.index') }}" class="mr-2">Dashboard</a> > <a href="{{ route('purchases.index') }}" class="ml-2 mr-2">Purchases</a> > <span class="ml-2">Create</span>
    </div>
    <div class="col-span-12">
        <p class="font-black">Record a Purchase</p>

        <div class="md:w-1/3 w-full md:bg-white mt-7 p-4 md:border border-gray-200 rounded-md">
            <form action="{{ route('purchases.store') }}" method="post">
                @csrf
                <input type="text" name="referred_id" value="{{ Auth::user()->id }}" hidden>
                <div>
                    <label for="product_name" class="text-sm">Product Name</label>
                    <input type="text" name="product_name" class="input">
                    @error('product_name')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-2">
                    <label for="amount" class="text-sm">Amount</label>
                    <input type="number" name="amount" class="input">
                    @error('amount')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button class="block md:w-fit w-full p-2 mt-3 rounded-md text-white bg-blue-900 hover:bg-blue-950 transition-all outline-0 border-0">Save</button>
            </form>
            <p class="text-md text-green-600 mt-2">
                @if(session('success'))
                {{ session('success') }}
                @endif 
            </p>
        </div>
    </div>
</x-dashboard-layout>
