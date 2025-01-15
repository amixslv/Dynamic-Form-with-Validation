<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynamicFormController extends Controller
{
    public function create()
    {
        return view('dynamic-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string',
            'access_level' => 'required_if:role,Admin|string|max:255',
        ]);

        

        return back()->with('success', 'Form submitted successfully!');
    }
}
