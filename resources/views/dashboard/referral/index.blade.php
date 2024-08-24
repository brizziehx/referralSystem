<x-dashboard-layout>
    <div class="flex items-center">
        <a href="{{ route('dashboard.index') }}" class="mr-2">Dashboard</a> > <span class="ml-2">Referrals</span>
    </div>
    <div class="flex justify-between flex-col col-span-12">
        <p class="col-span-12">Referral Link</p>
        <div class="w-full flex mb-4">
            <input type="text" class="md:w-2/5 w-full border border-gray-300 border-r-0 px-3 outline-none" id="referralLink" value="{{ url('/register?ref=' . Auth::user()->referral_code) }}" readonly>
            <button class="bg-gray-300 p-1 rounded" type="button" onclick="copyReferralLink()">Copy</button>
        </div>
        <p>Referral Code: <span class="font-bold">{{ Auth::user()->referral_code }}</span></p>
    </div>

    <div class="col-span-12">
        <table class="md:w-2/3 w-full col-span-12 overflow-auto md:col-span-5 border-collapse text-center shadow p-4 ring-1 ring-gray-300 rounded-xl">
            <tr class="text-md rounded-xl p-2">
                <th class="th rounded-tl-xl">SN</th>
                <th class="th">Full Name</th>
                <th class="th">Email</th>
                <th class="th rounded-tr-xl">Status</th>
            </tr>
            @php
                $sn = 1;
            @endphp
            @foreach ($referrals as $referral)
                @php 
                    if($referral->referred->status == 1)  {
                        $status = "Used";
                    } else {
                        $status = "Not Used";
                    }
                @endphp
                <tr>
                    <td class="td">{{ $sn++ }}</td>
                    <td class="td">{{ $referral->referred->fullname }}</td>
                    <td class="td">{{ $referral->referred->email }}</td>
                    <td class="td">{{ $status }}</td>
                </tr>
            @endforeach
        </table>
        <div class="mt-4 md:w-2/3">
            {{ $referrals->links() }}
        </div>
    </div>

    <script>
        function copyReferralLink() {
            var referralLink = document.getElementById("referralLink");
            referralLink.select();
            referralLink.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(referralLink.value);
            alert("Referral link copied: " + referralLink.value);
        }
    </script>
</x-dashboard-layout>
