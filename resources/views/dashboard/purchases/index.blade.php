<x-dashboard-layout>
    <div class="flex col-span-12 justify-between">
        <p>Purchases</p>
        <a href="{{ route('purchases.create') }}" class="p-2 bg-gray-200 rounded-md hover:shadow-sm flex items-center"><i class="mr-1 bx bx-wallet-alt"></i> Record purchase</a>
    </div>
    <div class="col-span-12 mt-3">
        <table class="w-2/5 col-span-5 border-collapse text-center shadow p-4 ring-1 ring-gray-300 rounded-xl">
            <tr class="text-md rounded-xl p-2">
                <th class="th rounded-tl-xl">SN</th>
                <th class="th">Product Name</th>
                <th class="th">Amount</th>
                <th class="th rounded-tr-xl"></th>
            </tr>
            @php
                $sn = 1;
            @endphp
            @foreach ($purchases as $purchase)
                <tr>
                    <td class="td">{{ $sn++ }}</td>
                    <td class="td">{{ $purchase->product_name }}</td>
                    <td class="td">{{  number_format($purchase->amount, 2) }}</td>
                    <td class="td"></td>
                </tr>
            @endforeach
        </table>
    </div>
</x-dashboard-layout>
