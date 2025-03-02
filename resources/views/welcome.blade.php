@extends('layouts.master')
@section('content')


@if(Route::currentRouteName() == 'home')
<div class="relative w-full h-[600px]">
    <img src="{{ asset('images/banner.png') }}" alt="Banner" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to Hotel Chris</h1>
        <p class="mb-6">Examole for now</p>
        <a href="#searchroom" class="bg-sky-300 text-white px-6 py-3 rounded-md hover:bg-sky-400">
            Explore Our Room
        </a>
    </div>
</div>
@endif

     
  
@endsection