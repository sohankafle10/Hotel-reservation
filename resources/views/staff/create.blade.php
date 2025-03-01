@extends('layouts.app')
@section('content')

<h1 class="text-4xl font-extrabold text-blue-900">Create Staff</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('staff.store')}}" method="POST" class="mt-5">
    @csrf

    <input type="text" placeholder="Enter Staff Name" name="name" class="w-full rounded-lg my-2" value="{{old('name')}}">
    @error('name')
        <p class="text-red-600 -mt-2">{{$message}}</p>
    @enderror

    <input type="text" placeholder="Enter Role" name="role" class="w-full rounded-lg my-2" value="{{old('role')}}">
    @error('role')
        <p class="text-red-600 -mt-2">{{$message}}</p>
    @enderror

    <input type="text" placeholder="Enter Phone Number" name="phone_number" class="w-full rounded-lg my-2" value="{{old('phone_number')}}">
    @error('phone_number')
        <p class="text-red-600 -mt-2">{{$message}}</p>
    @enderror

    <input type="email" placeholder="Enter Email" name="email" class="w-full rounded-lg my-2" value="{{old('email')}}">
    @error('email')
        <p class="text-red-600 -mt-2">{{$message}}</p>
    @enderror

    <div class="flex mt-4 justify-center gap-4">
        <input type="submit" value="Add Staff" class="bg-blue-600 text-white px-5 py-3 rounded-lg cursor-pointer">
        <a href="{{route('staff.index')}}" class="bg-red-600 text-white px-10 py-3 rounded-lg">Exit</a>
    </div>
</form>

@endsection
