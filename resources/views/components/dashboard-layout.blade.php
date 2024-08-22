<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/js/app.js','resources/css/app.css']) 
</head>
<body class="w-full bg-gray-50 font-poppins">
    <aside class="w-aside bg-gray-300 h-screen fixed">
        <header class="p-2 my-3 mx-2">
            <p class="text-center">Referral System</p>
        </header>
        <nav class="p-2 my-3 mx-2 ease-in-out duration-1000">
            <a href="{{ route('dashboard.index') }}" class="{{ request()->routeIs('dashboard.index') ? 'bg-slate-50' : '' }} flex items-center p-2 mb-2 hover:bg-slate-50  rounded-md">
                <i class="bx bx-home-alt text-md mr-2"></i>
                Dashboard
            </a>
            <a href="{{ route('dashboard.index') }}" class="flex items-center p-2 mb-2 hover:bg-slate-50 rounded-md">
                <i class="bx bx-group text-md mr-2"></i>
                Referrals
            </a>
            {{-- <a href="{{ route('dashboard.index') }}" class="block p-2  rounded-md">
                Logout
            </a> --}}
            <form action="{{ route('logout') }}" method="post" class="w-full  px-1 hover:bg-slate-50 py-2  rounded-md">
                @csrf
                <i class="bx bx-log-out text-md mr-2"></i>
                <button class="">Logout</button>
            </form>
        </nav>
    </aside>
    <main class="w-main ml-auto">
        <header class="h-16 w-full bg-white border-b border-gray-200 grid grid-cols-12 items-center">
            <div class="col-span-6">

            </div>
            <div class="col-span-6 mx-3 text-right">
                <p>{{ Auth::user()->fullname }}</p>
            </div>
        </header>
        <main class="h-auto mx-3 py-3 grid grid-cols-12 gap-4">
            {{ $slot }}
        </main>
    </main>
</body>
</html>