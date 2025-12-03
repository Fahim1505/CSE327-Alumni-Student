<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = Profile::firstOrFail();
        return view('profile', compact('profile'));
    }

    public function edit()
    {
        $profile = Profile::firstOrFail();
        return view('edit_profile', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::firstOrFail();

        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'batch'         => 'required|string|max:255',
            'department'    => 'required|string|max:255',
            'workplace'     => 'nullable|string|max:255',
            'email'         => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($profile->id),
            ],
            'phone'         => [
                'required',
                'string',
                'max:20',
                Rule::unique('users', 'phone')->ignore($profile->id),
            ],
            'linkedin'      => 'nullable|string|max:255',
            'twitter'       => 'nullable|string|max:255',
            'github'        => 'nullable|string|max:255',
            'website'       => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $data['profile_photo'] = $path;
        }

        $profile->update($data);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}
