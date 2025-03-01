<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('room.index', compact('rooms'));
    }

    public function create()
    {
        $categories = Categories::orderBy('priority')->get();
        return view('room.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'available' => 'required|numeric',
            'status' => 'required',
            'photopath' => 'required|image',
        ]);

        // Store the image
        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/rooms'), $photoname);
        $data['photopath'] = $photoname;

        Room::create($data);
        return redirect(route('room.index'))->with('success', 'Room created successfully');
    }

    public function edit($id)
    {
        $room = Room::find($id);
        $categories = Categories::orderBy('priority')->get();
        return view('room.edit', compact('room', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'available' => 'required|numeric',
            'status' => 'required',
            'photopath' => 'nullable|image',
        ]);

        $room = Room::find($id);
        $data['photopath'] = $room->photopath;

        if ($request->hasFile('photopath')) {
            // Store new image
            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/rooms'), $photoname);
            $data['photopath'] = $photoname;

            // Delete old image
            $oldphoto = public_path('images/rooms/' . $room->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
        }

        $room->update($data);
        return redirect(route('room.index'))->with('success', 'Room updated successfully');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        // Check if the room is in any pending or processing orders
        $hasPendingOrders = Order::where('room_id', $id)
                                 ->whereIn('status', ['pending', 'processing'])
                                 ->exists();

        if ($hasPendingOrders) {
            return redirect()->route('room.index')->with('error', 'Cannot delete room. It is associated with a pending or processing order.');
        }

        // Get the room image path
        $photoPath = public_path('images/rooms/' . $room->photopath);

        // Delete the image if it exists
        if (file_exists($photoPath) && is_file($photoPath)) {
            unlink($photoPath);
        }

        // Delete the room
        $room->delete();

        return redirect()->route('room.index')->with('success', 'Room deleted successfully');
    }
}
