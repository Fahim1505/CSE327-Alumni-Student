<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentDonation;

class StudentDonationsController extends Controller
{
    /**
     * Display the list of all student donations
     */
    public function index()
    {
    $donations = StudentDonation::with('student')->latest()->get();
    return view('student_donations.student_donation_index', compact('donations'));
    }
    /**
     * Display the form for creating the donation by a registered student
     */
    public function create()
    {
        $students = Student::all();
        return view('student_donations.create');
    }
    /**
     * Store the donation made by the registered student
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'     => 'required|exists:students,id',
            'donation_id'    => 'required|integer',
            'donation_type'  => 'required|string|max:255',
            'description'    => 'nullable|string|max:500',
            'amount'         => 'required|numeric|min:1',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Add donor type for tracking usage
        $validated['donor_type'] = 'student';

        // Save uploaded image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('donations', 'public');
        }

        // Create donation
        StudentDonation::create($validated);

        return redirect()
            ->route('student-donations.index')
            ->with('success', 'Your Student Donation recorded successfully.');
    }
    public function show($id)
    {
        $donation = StudentDonation::with('student')->findOrFail($id);
        return view('donations.students.show', compact('donation'));
    }
    // Returns a form that allows editing the donation made by a registered Student
    public function edit($id)
    {
        $this->authorizeStudentDonation($donation);
        return view('student_donations.edit', compact('donation'));
    }
    /**
     *  Update your donation for registered students 
     */  
    public function update(Request $request, StudentDonation $donation)
    {
        $this->authorizeStudentDonation($donation);

        $validated = $request->validate([
            'student_id'     => 'required|exists:students,id',
            'donation_type'  => 'required|string|max:255',
            'description'    => 'nullable|string|max:500',
            'amount'         => 'required|numeric|min:1',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('donations', 'public');
        }

        $donation->update($validated);

        return redirect()->route('student-donations.index')
            ->with('success', 'Your donation has been updated successfully.');
    }
    /**
     *  Delete the donation 
     */  
    public function destroy(StudentDonation $donation)
    {
        $this->authorizeStudentDonation($donation);

        // Delete old image if exists
        if ($donation->image && file_exists(storage_path('app/public/' . $donation->image))) {
            unlink(storage_path('app/public/' . $donation->image));
        }

        $donation->delete();

        return redirect()->route('student-donations.index')
            ->with('success', 'Your donation has been deleted successfully.');
    }
    /**
     * This function checks the ownership of the registered student over the donation they're trying to modify
     */
    protected function authorizeStudentDonation(StudentDonation $donation)
    {
        if ($donation->student_id != auth()->id()) {
            abort(403, 'You are not allowed to modify this donation.');
        }
    }
}