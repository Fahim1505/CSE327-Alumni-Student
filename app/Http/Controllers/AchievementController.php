<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    // Display a listing of achievements
    public function index()
    {
        $achievements = Achievement::all();
        return view('achievements.index', compact('achievements'));
    }

    // Show form to create a new achievement
    public function create()
    {
        return view('achievements.create');
    }

    // Store a new achievement in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'date_achieved' => 'required|date',
        ]);

        Achievement::create($request->all());

        return redirect()->route('achievements.index')
                         ->with('success', 'Achievement added successfully.');
    }

    // Display a single achievement
    public function show(Achievement $achievement)
    {
        return view('achievements.show', compact('achievement'));
    }

    // Show form to edit an existing achievement
    public function edit(Achievement $achievement)
    {
        return view('achievements.edit', compact('achievement'));
    }

    // Update an existing achievement
    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'date_achieved' => 'required|date',
        ]);

        $achievement->update($request->all());

        return redirect()->route('achievements.index')
                         ->with('success', 'Achievement updated successfully.');
    }

    // Delete an achievement
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        return redirect()->route('achievements.index')
                         ->with('success', 'Achievement deleted successfully.');
    }
}
