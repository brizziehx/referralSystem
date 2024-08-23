<x-dashboard-layout>
    <a href="{{ route('referrals.index') }}" class="card relative">
        <p class="flex items-center justify-between">
            Referrals
            <i class="bx bx-group text-xl"></i>
        </p>
        <h1 class="text-4xl absolute bottom-4 mx-2">{{ $referral }}</h1>
    </a>
    
    <a href="{{ route('earnings.index') }}" class="card relative">
        <p class="flex items-center justify-between">
            Earnings
            <i class="bx bx-credit-card text-xl"></i>
        </p>
        <h1 class="mx-2 text-4xl absolute bottom-4">{{ Str::limit(number_format($earnings), 10, '...') }}</h1>
    </a>
    
    <a href="{{ route('purchases.index') }}" class="card relative">
        <p class="flex items-center justify-between">
            Purchases
            <i class="bx bx-wallet-alt text-xl"></i>
        </p>
        <h1 class="mx-2 text-4xl absolute bottom-4">{{ Str::limit(number_format($purchases), 10, '...') }}</h1>
    </a>

</x-dashboard-layout>