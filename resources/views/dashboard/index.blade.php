<x-dashboard-layout>
    <a href="{{ route('referral.index') }}" class="card">
        <p class="flex items-center justify-between">
            Referrals
            <i class="bx bx-group text-xl"></i>
        </p>
        
    </a>
    
    <a href="{{ route('earnings.index') }}" class="card">
        <p class="flex items-center justify-between">
            Earnings
            <i class="bx bx-credit-card text-xl"></i>
        </p>
    </a>
    
    <a href="#" class="card">
        <p class="flex items-center justify-between">
            Purchases
            <i class="bx bx-wallet-alt text-xl"></i>
        </p>

    </a>

</x-dashboard-layout>