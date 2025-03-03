<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooknowController extends Controller
{
    
    public function index()
    {
        return view('booknow');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'guests' => 'required',
            'message' => 'required',
        ]);
        
        return back()->with('success', 'Your reservation has been successfully submitted.');
    }
}
