<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    @include('layouts.alert')
    <div class="flex min-h-screen">
        <nav class="w-56 bg-white shadow-xl p-4 flex flex-col justify-between fixed h-full">
            <div>
                <div class="text-center mb-4">
                    <img src="{{ asset('image/Screenshot_2025-02-28_194738-removebg-preview.png') }}" alt="Logo" class="w-28 mx-auto">
                </div>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg text-base font-medium transition hover:bg-gray-200 @if(Route::is('dashboard')) bg-green-600 text-white hover:bg-green-500 @endif">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}" class="flex items-center p-3 rounded-lg text-base font-medium transition hover:bg-gray-200">
                            <i class="fas fa-folder mr-2"></i> Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{route('room.index')}}" class="flex items-center p-3 rounded-lg text-base font-medium transition hover:bg-gray-200">
                            <i class="fas fa-boxes mr-2"></i> Rooms
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg text-base font-medium transition hover:bg-gray-200">
                            <i class="fas fa-shopping-cart mr-2"></i> Reservation
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.show') }}" class="flex items-center p-3 rounded-lg text-base font-medium transition hover:bg-gray-200">
                            <i class="fas fa-users mr-2"></i> Users
                        </a>
                    </li>
                    <li>
                        <a href="{{route('staff.index')}}" class="flex items-center p-3 rounded-lg text-base font-medium transition hover:bg-gray-200">
                            <i class="fas fa-tachometer-alt mr-2"></i> Staff
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg text-base font-medium transition hover:bg-gray-200">
                            <i class="fas fa-images mr-2"></i> Banners
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 rounded-lg text-base font-medium transition hover:bg-gray-200">
                            <i class="fas fa-chart-line mr-2"></i> Report
                        </a>
                    </li>
                </ul>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center w-full p-3 rounded-lg text-base font-medium transition hover:bg-red-500 hover:text-white text-red-600" onclick="return confirm('Are you sure to logout?')">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </nav>
        <div class="ml-56 p-4 flex-1">
            @yield('content')
        </div>
    </div>
</body>

</html>
