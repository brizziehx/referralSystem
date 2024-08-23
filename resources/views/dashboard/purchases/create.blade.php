<x-dashboard-layout>
    <div class="col-span-12">
        <h1>Record a Purchase</h1>

        <div class="w-1/3 bg-white mt-7 p-4 border border-gray-200 rounded-md">
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
                <button class="block w-fit p-2 mt-3 rounded-md text-white bg-blue-900 hover:bg-blue-950 transition-all outline-0 border-0">Save</button>
            </form>
            <p class="text-md text-green-600 mt-2">
                @if(session('success'))
                {{ session('success') }}
                @endif 
            </p>
        </div>
    </div>
</x-dashboard-layout>