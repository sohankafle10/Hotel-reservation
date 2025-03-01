@extends('layouts.app')
@section('content')
    <h1 class="text-4xl font-extrabold text-blue-900">Edit Room</h1>
    <hr class="h-1 bg-red-500">

    <form action="{{route('room.update', $room->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        <select name="category_id" id="" class="w-full rounded-lg my-2">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($room->category_id == $category->id) selected @endif>{{ $category->name }}
                </option>
            @endforeach
        </select>

        <input type="text" placeholder="Enter Room Name" name="name" class="w-full rounded-lg my-2" value="{{ $room->name }}">
        @error('name')
            <p class="text-red-600 -mt-2 ">{{ $message }}</p>
        @enderror

        <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Room Description"
            class="w-full rounded-lg my-2">{{ $room->description }}</textarea>
        @error('description')
            <p class="text-red-600 -mt-2 ">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Enter Price" name="price" class="w-full rounded-lg my-2" value="{{ $room->price }}">
        @error('price')
            <p class="text-red-600 -mt-2 ">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Enter Discount Price" name="discounted_price" class="w-full rounded-lg my-2"
            value="{{ $room->discounted_price }}">
        @error('discounted_price')
            <p class="text-red-600 -mt-2 ">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Enter Available Room" name="available" class="w-full rounded-lg my-2" value="{{ $room->available }}">
        @error('available')
            <p class="text-red-600 -mt-2 ">{{ $message }}</p>
        @enderror

        <select name="status" id="" class="w-full rounded-lg my-2">
            <option value="Show" @if ($room->status=="Show") selected @endif>Show</option>
            <option value="Hide" @if ($room->status=="Hide") selected @endif>Hide</option>
        </select>
        @error('status')
            <p class="text-red-600 -mt-2 ">{{ $message }}</p>
        @enderror

        <input type="file" placeholder="Enter Room Image" name="photopath" class="w-full rounded-lg my-2">
        @error('photopath')
            <p class="text-red-600 -mt-2 ">{{ $message }}</p>
        @enderror

        <p>Current Picture</p>
        <img src="{{ asset('images/rooms/'.$room->photopath) }}" alt="" class="w-24 h-24">

        <div class="flex mt-4 justify-center gap-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Room</button>
            <a href="{{ route('room.index') }}" class="bg-red-600 text-white px-10 py-3 rounded-lg">Cancel</a>
        </div>
    </form>
@endsection
