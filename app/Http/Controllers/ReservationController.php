<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

public function store(Request $request)
{
    $request->validate([
        'check_in_date' => 'required|date|after_or_equal:today',
        'check_out_date' => 'required|date|after:check_in_date',
        'guests' => 'required|integer|min:1',
    ]);

    Reservation::create([
        'user_id' => auth()->id(),
        'room_id' => 1, // Example room ID
        'check_in_date' => $request->check_in_date,
        'check_out_date' => $request->check_out_date,
        'guests' => $request->guests,
        'status' => 'pending',
    ]);

    return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
}
