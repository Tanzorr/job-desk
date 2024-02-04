<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_jobs.index',
            ['jobs' => auth()->user()->employer
                ->jobs()
                ->withCount('employer','jobApplications' )
                ->get()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_jobs.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {

        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        return view('my_jobs.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $myJob)
    {
        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
