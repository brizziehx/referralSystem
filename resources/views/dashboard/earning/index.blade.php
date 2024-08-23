<x-dashboard-layout>
    <h1>Earnings</h1>
    <div class="col-span-12">
        <table class="w-1/3 col-span-5 border-collapse text-center shadow p-4 ring-1 ring-gray-300 rounded-xl">
            <tr class="text-md rounded-xl p-2">
                <th class="th rounded-tl-xl">SN</th>
                {{-- <th class="th">Product name</th> --}}
                {{-- <th class="th">Name</th> --}}
                <th class="th rounded-tr-xl">Amount Earned</th>
                {{-- <th class="th rounded-tr-xl"></th> --}}
            </tr>
            @php
                $sn = 1;
            @endphp
            @foreach ($purchases as $purchase)
                <tr>
                    <td class="td">{{ $sn++ }}</td>
                    {{-- <td class="td"></td> --}}
                    {{-- <td class="td"></td> --}}
                    <td class="td">{{ number_format($purchase->amount_earned) }}</td>
                    {{-- <td class="td"></td> --}}
                </tr>
            @endforeach
        </table>
    </div>
</x-dashboard-layout>
