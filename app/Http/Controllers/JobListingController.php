<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs = JobListing::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'description' => 'required|string',
            'dateline' => 'required|date',
        ]);

        JobListing::create($request->all());

        return redirect()->route('jobs.index')
                         ->with('success', 'Job listing added successfully.');
    }

    public function show(JobListing $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(JobListing $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, JobListing $job)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'description' => 'required|string',
            'dateline' => 'required|date',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index')
                         ->with('success', 'Job listing updated successfully.');
    }

    public function destroy(JobListing $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')
                         ->with('success', 'Job listing deleted successfully.');
    }
}
