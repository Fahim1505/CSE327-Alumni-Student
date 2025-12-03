<?php

namespace App\Http\Controllers;

use App\Models\StudentAchievements;
use Illuminate\Http\Request;

class StudentAchievementsController extends Controller
{
    // all achievements
    public function index()
    {
        $achievements = StudentAchievements::orderBy('createdAt', 'desc')->get();
        return view('achievements.index', compact('achievements'));
    }

    //create form
    public function create()
    {
        $departments = ['CSE', 'EEE', 'BBA', 'ME', 'Civil', 'Architecture'];
        return view('achievements.create', compact('departments'));
    }

    // Helper function to count words
    protected function countWords($text)
    {
        if (!$text)
            return 0;
        $clean = trim(preg_replace('/\s+/', ' ', strip_tags($text)));
        return $clean ? str_word_count($clean) : 0;
    }

    //  new achievement
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'department' => 'required|in:CSE,EEE,BBA,ME,Civil,Architecture',
            'title' => 'required|string|max:400',
            'description' => 'required|string|max:2000',
            'imagePath' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        if ($this->countWords($request->title) > 20) {
            return back()->withInput()->withErrors(['title' => 'Title cannot exceed 20 words.']);
        }

        if ($this->countWords($request->description) > 100) {
            return back()->withInput()->withErrors(['description' => 'Description cannot exceed 100 words.']);
        }

        $path = $request->file('imagePath')?->store('achievement_images', 'public');

        StudentAchievements::create([
            'student_id' => $request->student_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'department' => $request->department,
            'title' => $request->title,
            'description' => $request->description,
            'imagePath' => $path,
        ]);

        return redirect()->route('achievements.index')->with('success', 'Achievement added successfully.');
    }

    // edit form
    public function edit($id)
    {
        $achievement = StudentAchievements::findOrFail($id);
        $departments = ['CSE', 'EEE', 'BBA', 'ME', 'Civil', 'Architecture'];
        return view('achievements.edit', compact('achievement', 'departments'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $achievement = StudentAchievements::findOrFail($id);

        $request->validate([
            'student_id' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'department' => 'required|in:CSE,EEE,BBA,ME,Civil,Architecture',
            'title' => 'required|string|max:400',
            'description' => 'required|string|max:2000',
            'imagePath' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        if ($this->countWords($request->title) > 20) {
            return back()->withInput()->withErrors(['title' => 'Title cannot exceed 20 words.']);
        }

        if ($this->countWords($request->description) > 100) {
            return back()->withInput()->withErrors(['description' => 'Description cannot exceed 100 words.']);
        }

        if ($request->hasFile('imagePath')) {
            $achievement->imagePath = $request->file('imagePath')->store('achievement_images', 'public');
        }

        $achievement->update([
            'student_id' => $request->student_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'department' => $request->department,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('achievements.index')->with('success', 'Achievement updated.');
    }

    // Delete
    public function destroy($id)
    {
        $achievement = StudentAchievements::findOrFail($id);

        if ($achievement->imagePath && \Storage::disk('public')->exists($achievement->imagePath)) {
            \Storage::disk('public')->delete($achievement->imagePath);
        }

        $achievement->delete();

        return redirect()->route('achievements.index')->with('success', 'Achievement deleted.');
    }
}

