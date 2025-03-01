<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Staff;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts for each statistic
        $categories = Categories::count();
        $rooms = Room::count();
        // $reserved_rooms = Room::where('status', 'Reserved')->count();
        // $available_rooms = Room::where('status', 'Available')->count();
         $users = User::count();
         $staff = Staff::count(); // Assuming you have a 'role' column in the User model

        // Pass the data to the view
        return view('dashboard', compact(
            'categories', 
            'rooms', 
            'staff',
            'users'
            // 'reserved_rooms', 
            // 'available_rooms'
             
             
        ));
    }
}
