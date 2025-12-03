<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->get();
        return view('announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcement.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|max:255',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        Announcement::create($data);

        return back()->with('success', 'Announcement Added Successfully!');
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcement.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);

        $data = $request->validate([
            'subject' => 'required|max:255',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        $announcement->update($data);

        return redirect()->route('announcement.index')->with('success', 'Announcement Updated Successfully!');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('announcement.index')->with('success', 'Announcement Deleted Successfully!');
    }
}
