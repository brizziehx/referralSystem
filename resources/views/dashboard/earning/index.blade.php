<x-dashboard-layout>
    <div class="flex items-center">
        <a href="{{ route('dashboard.index') }}" class="mr-2">Dashboard</a> > <span class="ml-2">Earnings</span>
    </div>
    <div class="col-span-12">
        <p class="mb-5 font-bold">Earnings</p>
        <table class="md:w-1/3 w-full col-span-5 border-collapse text-center shadow p-4 ring-1 ring-gray-300 rounded-xl">
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

        <div class="mt-4 md:w-1/3">
            {{ $purchases->links() }}
        </div>
    </div>
</x-dashboard-layout>
