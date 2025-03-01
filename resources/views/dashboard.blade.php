@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Dashboard Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-gray-900">Dashboard</h1>
        <hr class="mt-4 border-t border-gray-300">
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Categories -->
        <div class="flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 rounded-lg shadow-md hover:shadow-lg">
            <div>
                <h2 class="text-2xl font-semibold">Categories</h2>
                <p class="text-lg mt-2">Total: <span class="font-bold">{{ $categories }}</span></p>
            </div>
            <i class="fas fa-folder text-4xl"></i>
        </div>

        <!-- Rooms -->
        <div class="flex items-center justify-between bg-gradient-to-r from-indigo-500 to-indigo-700 text-white p-6 rounded-lg shadow-md hover:shadow-lg">
            <div>
                <h2 class="text-2xl font-semibold">Rooms</h2>
                <p class="text-lg mt-2">Total: <span class="font-bold">{{ $rooms }}</span></p>
            </div>
            <i class="fas fa-bed text-4xl"></i>
        </div>

        <!-- Reserved Rooms -->
        <div class="flex items-center justify-between bg-gradient-to-r from-red-500 to-red-700 text-white p-6 rounded-lg shadow-md hover:shadow-lg">
            <div>
                <h2 class="text-2xl font-semibold">Reserved Rooms</h2>
                <p class="text-lg mt-2">Total: <span class="font-bold"></span></p>
            </div>
            <i class="fas fa-clock text-4xl"></i>
        </div>

        <!-- Available Rooms -->
        <div class="flex items-center justify-between bg-gradient-to-r from-green-500 to-green-700 text-white p-6 rounded-lg shadow-md hover:shadow-lg">
            <div>
                <h2 class="text-2xl font-semibold">Available Rooms</h2>
                <p class="text-lg mt-2">Total: <span class="font-bold"></span></p>
            </div>
            <i class="fas fa-check-circle text-4xl"></i>
        </div>

        <!-- Number of Staff -->
        <div class="flex items-center justify-between bg-gradient-to-r from-yellow-500 to-yellow-700 text-white p-6 rounded-lg shadow-md hover:shadow-lg">
            <div>
                <h2 class="text-2xl font-semibold">Number of Staff</h2>
                <p class="text-lg mt-2">Total: <span class="font-bold">{{ $staff }}</span></p>
            </div>
            <i class="fas fa-users text-4xl"></i>
        </div>

        <!-- Users -->
        <div class="flex items-center justify-between bg-gradient-to-r from-pink-500 to-pink-700 text-white p-6 rounded-lg shadow-md hover:shadow-lg">
            <div>
                <h2 class="text-2xl font-semibold">Users</h2>
                <p class="text-lg mt-2">Total: <span class="font-bold">{{$users}}</span></p>
            </div>
            <i class="fas fa-users text-4xl"></i>
        </div>
    </div>

    
@endsection
