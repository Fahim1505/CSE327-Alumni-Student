<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'date' => 'required|date',
            'venue' => 'required|max:255',
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/events'), $imageName);
            $data['image'] = $imageName;
        }

        Event::create($data);

        return back()->with('success', 'Event Added Successfully!');
    }

    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }
}
