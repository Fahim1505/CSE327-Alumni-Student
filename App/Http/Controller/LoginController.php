<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'reg_no' => 'required',
            'password' => 'required',
        ]);

        $user = Alumni::where('reg_no', $request->reg_no)->first();

        if($user && Hash::check($request->password, $user->password))
        {
            // store session
            session([
                'user_id' => $user->id,
                'name'    => $user->name,
                'reg_no'  => $user->reg_no,
            ]);

            return redirect('/dashboard')->with('success', 'Login Successful');
        }
        else
        {
            return back()->with('error', 'Invalid Registration No or Password');
        }
    }
}
