<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    // show list page
    public function index()
    {
        $donations = Donation::orderBy('created_at', 'desc')->get();

        return view('donation_index', compact('donations'));
    }

    // show form page
    public function create()
    {
        return view('donation');
    }

    // handle form submit from donation.blade.php
    public function store(Request $request)
    {
        $data = $request->validate([
            'donation_id'   => 'nullable|integer',
            'donation_type' => 'required|in:Money,food,cloth,Books,Equipment,Other',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }

        Donation::create($data);

        return redirect()->route('donation.index')->with('success', 'Donation saved successfully');
    }
}
