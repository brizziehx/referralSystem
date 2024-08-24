<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/js/app.js','resources/css/app.css']) 
    <script src="{{ asset('js/main.js') }}" defer></script>
</head>
<body class="w-full bg-gray-50 font-poppins">
    <aside class="-left-3/4 md:left-0 md:block md:w-aside z-30 w-3/4 ease-in-out duration-1000 bg-gray-300 h-screen fixed">
        <header class="p-2 my-3 mx-2 flex justify-between items-center">
            <p class="md:justify-center">Referral System</p>
            <i class="bx bx-x text-3xl cursor-pointer md:hidden" id="close"></i>
        </header>
        <nav class="p-2 my-3 mx-2 ease-in-out duration-1000">
            <a href="{{ route('dashboard.index') }}" class="{{ request()->routeIs('dashboard.index') ? 'bg-slate-50' : '' }} flex items-center p-2 mb-2 hover:bg-slate-50  rounded-md">
                <i class="bx bx-home-alt text-md mr-2"></i>
                Dashboard
            </a>
            <a href="{{ route('referrals.index') }}" class="{{ request()->routeIs('referrals.index') ? 'bg-slate-50' : '' }} flex items-center p-2 mb-2 hover:bg-slate-50 rounded-md">
                <i class="bx bx-group text-md mr-2"></i>
                Referrals
            </a>
            <a href="{{ route('earnings.index') }}" class="{{ request()->routeIs('earnings.index') ? 'bg-slate-50' : '' }} flex items-center p-2 mb-2 hover:bg-slate-50 rounded-md">
                <i class="bx bx-credit-card text-md mr-2"></i>
                Earnings
            </a>
            <a href="{{ route('purchases.index') }}" class="{{ request()->routeIs('purchases.index') || request()->routeIs('purchases.create') ? 'bg-slate-50' : '' }} flex items-center p-2 mb-2 hover:bg-slate-50 rounded-md">
                <i class="bx bx-wallet-alt text-md mr-2"></i>
                Purchases
            </a>
            
            <form action="{{ route('logout') }}" method="post" class="w-full  px-1 hover:bg-slate-50 py-2  rounded-md">
                @csrf
                <i class="bx bx-log-out text-md mr-2"></i>
                <button class="">Logout</button>
            </form>
        </nav>
    </aside>
    <main class="md:w-main md:ml-auto z-10">
        <header class="h-16 w-full bg-white border-b border-gray-200 grid grid-cols-12 items-center">
            <div class="col-span-6">
                <i id="burger" class="bx bx-menu cursor-pointer text-3xl ml-3 md:hidden"></i>
            </div>
            <div class="col-span-6 mx-3 text-right">
                <span class="border border-gray-200 bg-gray-100 rounded-md p-2">{{ Auth::user()->fullname }}</span>
            </div>
        </header>
        <main class="h-auto mx-3 py-3 grid grid-cols-12 gap-4">
            {{ $slot }}
        </main>
    </main>
</body>
</html>