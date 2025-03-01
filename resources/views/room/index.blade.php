@extends('layouts.app')
@section('content')

<h1 class="text-4xl font-extrabold text-blue-900">Rooms</h1>
    <hr class="h-1 bg-red-500">

    <div class="text-right my-5">
        <a href="{{route('room.create')}}" class="bg-green-700 text-white px-5 py-3 rounded-lg">Add Room</a>
    </div>

    <table class="w-full mt-5">
        <tr>
            <th class="border p-2 bg-gray-200">S.N</th>
            <th class="border p-2 bg-gray-200">Room Picture</th>
            <th class="border p-2 bg-gray-200">Room Name</th>
            <th class="border p-2 bg-gray-200">Description</th>
            <th class="border p-2 bg-gray-200">Price</th>
            <th class="border p-2 bg-gray-200">Discount Price</th>
            <th class="border p-2 bg-gray-200">Available</th>
            <th class="border p-2 bg-gray-200">Status</th>
            <th class="border p-2 bg-gray-200">Category</th>
            <th class="border p-2 bg-gray-200">Action</th>
        </tr>

        @foreach ($rooms as $room)

        <tr class="text-center">
            <td class="border p-2">{{$loop->iteration}}</td>
            <td class="border p-2"><img src="{{asset('images/rooms/'.$room->photopath)}}" alt="" class="h-16 w-16" ></td>
            <td class="border p-2">{{$room->name}}</td>
            <td class="border p-2">{{$room->description}}</td>
            <td class="border p-2">{{$room->price}}</td>
            <td class="border p-2">{{$room->discounted_price}}</td>
            <td class="border p-2">{{$room->available}}</td>
            <td class="border p-2">{{$room->status}}</td>
            <td class="border p-2">{{$room->category->name}}</td>

            <td class="border p-2">
                <a href="{{route('room.edit',$room->id)}}" class="bg-blue-900 text-white px-3 py-1 rounded mx-1">Edit</a>
                <a href="{{route('room.destroy',$room->id)}}" class="bg-red-600 text-white px-3 py-1 rounded mx-1" onclick="return confirm('Are you sure to Delete?')">Delete</a>
            </td>
        </tr>

        @endforeach
    </table>

@endsection
