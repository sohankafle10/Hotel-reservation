@extends('layouts.app')
@section('content')

<h1 class="text-4xl font-extrabold text-blue-900">Edit Staff</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('staff.update', $staff->id)}}" method="POST" class="mt-5">
    @csrf
    @method('PUT')

    <input type="text" placeholder="Enter Staff Name" name="name" class="w-full rounded-lg my-2" value="{{ $staff->name }}">
    @error('name')
        <p class="text-red-600 -mt-2">{{ $message }}</p>
    @enderror

    <input type="text" placeholder="Enter Role" name="role" class="w-full rounded-lg my-2" value="{{ $staff->role }}">
    @error('role')
        <p class="text-red-600 -mt-2">{{ $message }}</p>
    @enderror

    <input type="text" placeholder="Enter Phone Number" name="phone_number" class="w-full rounded-lg my-2" value="{{ $staff->phone_number }}">
    @error('phone_number')
        <p class="text-red-600 -mt-2">{{ $message }}</p>
    @enderror

    <input type="email" placeholder="Enter Email" name="email" class="w-full rounded-lg my-2" value="{{ $staff->email }}">
    @error('email')
        <p class="text-red-600 -mt-2">{{ $message }}</p>
    @enderror

    <div class="flex mt-4 justify-center gap-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Staff</button>
        <a href="{{ route('staff.index') }}" class="bg-red-600 text-white px-10 py-3 rounded-lg">Cancel</a>
    </div>
</form>

@endsection
