@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Dashboard Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-gray-800">Dashboard</h1>
        <hr class="mt-4 border-t border-gray-300">
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $stats = [
                ['title' => 'Categories', 'icon' => 'fas fa-folder', 'color' => 'bg-gradient-to-r from-cyan-500 to-blue-600'],
                ['title' => 'Rooms', 'icon' => 'fas fa-bed', 'color' => 'bg-gradient-to-r from-indigo-500 to-purple-600'],
                ['title' => 'Reserved Rooms', 'icon' => 'fas fa-clock', 'color' => 'bg-gradient-to-r from-red-500 to-orange-600'],
                ['title' => 'Available Rooms', 'icon' => 'fas fa-check-circle', 'color' => 'bg-gradient-to-r from-green-500 to-teal-600'],
                ['title' => 'Number of staff', 'icon' => 'fas fa-users', 'color' => 'bg-gradient-to-r from-yellow-500 to-amber-600'],
                ['title' => 'Users', 'icon' => 'fas fa-users', 'color' => 'bg-gradient-to-r from-pink-500 to-rose-600']
            ];
        @endphp

        @foreach ($stats as $stat)
        <div class="flex items-center justify-between {{ $stat['color'] }} text-white p-6 rounded-xl shadow-lg transition-all transform hover:scale-105 hover:shadow-2xl">
            <div>
                <h2 class="text-3xl font-bold">{{ $stat['title'] }}</h2>
                <p class="text-lg mt-2">Total: <span class="font-bold text-xl">0</span></p>
            </div>
            <i class="{{ $stat['icon'] }} text-5xl opacity-80"></i>
        </div>
        @endforeach
    </div>
</div>
@endsection
