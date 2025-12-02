<?php

namespace App\Http\Controllers;

use App\Alumni;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class StudentsController extends Controller
{
  public function index()
  {
    //

    $posts = Student::orderBy("id", "desc")->get();
    return view("students.index")->with("posts", $posts);
  }

  public function create()
  {
    
  }

  public function store(Request $request)
  {
    
  }

  public function show($id)
  {
  
  }
  /**
   * This function allows a registered student to edit their profile
   */
  public function edit()
  {
        if (!Auth::check() || !Auth::user() instanceof Student) {
            abort(403, "You are not authorized to do that.");
        }

        $student = Auth::user();

        return view('students.edit', compact('student'));
  }
  /**
   * This function updates the profile of the student once they have edited their profile
   */

  public function update(Request $request)
  {
    
        if (!Auth::check() || !Auth::user() instanceof Student) {
            abort(403, "You are not authorized to do that .");
        }

        $student = Auth::user();

        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'admission_year'   => 'required|integer|min:1900|max:2100',
            'current_semester' => 'required|integer|min:1|max:12',
            'division'         => 'required|string|max:10',
            'student_id'       => 'required|string|max:255',
        ]);

        $student->update($validated);

        return redirect()
            ->route('student.profile.edit')
            ->with('success', 'Profile updated successfully.');
  }

  public function storeDonation(Request $request, $student_id)
  {
    $validated = $request->validate([
        'donation_type' => 'required|string',
        'description'   => 'nullable|string',
        'amount'        => 'nullable|numeric',
        'image'         => 'nullable|image|max:2048'
    ]);


    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('donations', 'public');
  

    StudentDonation::create([
        'student_id'    => $student_id,
        'donation_type' => $validated['donation_type'],
        'description'   => $validated['description'] ?? null,
        'amount'        => $validated['amount'] ?? null,
        'image'         => $imagePath,
    ]);

    return redirect()->back()->with('success', 'Donation submitted successfully.');
}
}
}
