<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
public function show()
{
return view('register');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:alumnis,email', // FIXED LINE
        'password' => 'required|string|min:6|confirmed',
        'reg_no' => 'nullable|string|max:50',
        'department' => 'nullable|string|max:100',
        'graduation_year' => 'nullable|digits:4',
    ]);

    $data['password'] = Hash::make($data['password']);

    Alumni::create($data);

    return redirect()->back()->with('success', 'Registration successful!');
}

}