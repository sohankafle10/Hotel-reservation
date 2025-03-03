<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Chris</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('image/Screenshot_2025-02-28_194738-removebg-preview.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    @include('layouts.alert')
      <!-- Top Bar -->
      <div class="flex flex-wrap justify-between items-center px-6 sm:px-16 py-2 bg-red-500 text-white">
        <!-- Social Media Icons -->
        <div class="flex space-x-4 mb-2 sm:mb-0">
            <a href="https://www.facebook.com/sohan.kafle.3" target="_blank"
                class="text-white text-2xl hover:text-orange-300 transition-transform transform hover:scale-110">
                <i class="ri-facebook-fill"></i>
            </a>
            <a href="https://twitter.com" target="_blank"
                class="text-white text-2xl hover:text-orange-300 transition-transform transform hover:scale-110">
                <i class="ri-twitter-fill"></i>
            </a>
            <a href="https://www.instagram.com/sohankafle14/" target="_blank"
                class="text-white text-2xl hover:text-orange-300 transition-transform transform hover:scale-110">
                <i class="ri-instagram-fill"></i>
            </a>
            <a href="https://youtube.com" target="_blank"
                class="text-white text-2xl hover:text-orange-300 transition-transform transform hover:scale-110">
                <i class="ri-youtube-fill"></i>
            </a>
        </div>
        <!-- Contact Info -->
        <p class="text-lg sm:text-base">Call us: 9869464140</p>
    </div>

    <nav class="shadow bg-white px-16 py-4 mb-10 h-16 flex justify-between font-semibold text-xl items-center sticky top-0 z-40">
        <img src="{{ asset('image/Screenshot_2025-02-28_194738-removebg-preview.png') }}" alt="" class="h-16">

        <!-- Search Form -->
        <form action="#" method="GET">
            <input type="search" class="border border-gray-300 rounded-lg px-16 py-2" placeholder="Search" name="search"
                value="{{request()->query('search')}}">
            <button type="submit" class="bg-orange-700 text-white rounded-lg px-4 py-2 hover:bg-orange-800">Search</button>
        </form>

       <!-- Links -->
<div class="flex gap-4 items-center">
    <a href="{{ route('home') }}" class="hover:text-purple-700">
        <i class="ri-home-5-line mr-2"></i> Home
    </a>

    <!-- Dropdown Menu for Categories -->
    <div class="relative">
        <button id="dropdownButton" class="flex items-center gap-1 hover:text-purple-700 text-black focus:outline-none">
            <i class="ri-list-check mr-2"></i> Categories
            <i class="ri-arrow-down-s-line"></i>
        </button>
        <!-- Dropdown Content -->
        <div id="dropdownMenu" class="absolute hidden bg-white shadow-md rounded-lg mt-2 w-48 transition duration-300 transform origin-top scale-95">
            @php
            $categories = App\Models\Categories::orderBy('priority')->get();
            @endphp
            @foreach ($categories as $category)
            <a href="{{ route('categoryroom', $category->id) }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-700 hover:text-white">
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </div>

    <!-- Auth Section -->
    @auth
    <div class="relative group">
        <!-- Profile Picture -->
        <div class="relative inline-block">
            @if (auth()->user()->profilepicture)
            <img class="object-cover w-10 h-10 rounded-full cursor-pointer" src="{{ asset('images/profilepictures/' . auth()->user()->profilepicture) }}">
            @else
            <div class="flex items-center justify-center w-10 h-10 text-white bg-purple-700 rounded-full cursor-pointer">
                <span class="font-bold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
            </div>
            @endif
        </div>
        <!-- Dropdown Menu -->
        <div class="absolute hidden group-hover:block top-8 -right-10 bg-white shadow w-32 rounded-lg">
            <a href="{{route('profile.edit')}}" class="block hover:bg-gray-200 p-4 py-2 rounded-md">My Profile</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block py-2 hover:bg-gray-200 p-4 rounded-md w-full text-left">Logout</button>
            </form>
        </div>
    </div>
    @else
    <a href="{{ route('login') }}" class="hover:text-purple-700">
        <i class="ri-login-box-line mr-2"></i> Login
    </a>
    @endauth

    <!-- Book Now Button -->
    <a href="{{ route('booknow') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
        <i class="ri-calendar-check-fill mr-2"></i> Book Now
    </a>
</div>
