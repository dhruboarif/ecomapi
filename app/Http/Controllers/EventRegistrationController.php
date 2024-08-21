<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $eventRegistration = new EventRegistration();
        $eventRegistration->name = $request->name;
        $eventRegistration->email = $request->email;
        $eventRegistration->phone = $request->phone;
        $eventRegistration->save();

        // Add Bkash payment integration code here

        return redirect('/')->with('success', 'Registration successful!');
    }
}
