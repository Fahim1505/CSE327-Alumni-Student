<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of all jobs.
     */
    public function index()
    {
        // Get all jobs ordered by deadline
        $jobs = Job::orderBy('dateline', 'asc')->get();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created job in the database.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'job_title'    => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_type'     => 'required|string|max:255',
            'description'  => 'required|string',
            'dateline'     => 'required|date',
        ]);

        // Create the job
        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job added successfully!');
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified job in the database.
     */
    public function update(Request $request, Job $job)
    {
        // Validate the input
        $request->validate([
            'job_title'    => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_type'     => 'required|string|max:255',
            'description'  => 'required|string',
            'dateline'     => 'required|date',
        ]);

        // Update the job
        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified job from the database.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }

    /**
     * Display a single job detail.
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }
}
