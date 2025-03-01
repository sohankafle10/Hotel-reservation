@extends('layouts.app')
@section('content')

<h1 class="text-4xl font-extrabold text-blue-900">Staff Members</h1>
<hr class="h-1 bg-red-500">

<div class="text-right my-5">
    <a href="{{route('staff.create')}}" class="bg-green-700 text-white px-5 py-3 rounded-lg">Add Staff</a>
</div>

<table class="w-full mt-5">
    <tr>
        <th class="border p-2 bg-gray-200">S.N</th>
        <th class="border p-2 bg-gray-200">Name</th>
        <th class="border p-2 bg-gray-200">Role</th>
        <th class="border p-2 bg-gray-200">Phone Number</th>
        <th class="border p-2 bg-gray-200">Email</th>
        <th class="border p-2 bg-gray-200">Action</th>
    </tr>

    @foreach ($staff as $member)

    <tr class="text-center">
        <td class="border p-2">{{$loop->iteration}}</td>
        <td class="border p-2">{{$member->name}}</td>
        <td class="border p-2">{{$member->role}}</td>
        <td class="border p-2">{{$member->phone_number}}</td>
        <td class="border p-2">{{$member->email}}</td>

        <td class="border p-2">
            <a href="{{route('staff.edit', $member->id)}}" class="bg-blue-900 text-white px-3 py-1 rounded mx-1">Edit</a>
            <form action="{{ route('staff.destroy', $member->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded mx-1" onclick="return confirm('Are you sure to Delete?')">Delete</button>
            </form>
        </td>
    </tr>

    @endforeach
</table>

@endsection
