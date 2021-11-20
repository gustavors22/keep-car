<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobsStoreRequest;
use App\Http\Requests\JobsUpdateRequest;
use App\Models\Client;
use App\Models\Job;
use App\Models\Vehicle;
use Carbon\Carbon;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        $jobs = $jobs->map(function ($job) {
            $job->start_date = Carbon::parse($job->start_date)->format('d/m/Y');
            $job->end_date = $job->end_date ? Carbon::parse($job->end_date)->format('d/m/Y') : '-';

            return $job;
        });
            
        return view('pages.Jobs.index', compact('jobs'));
    }

    public function create()
    {
        $clients = Client::pluck('name', 'id');
        $vehicles = Vehicle::pluck('model', 'id');

        return view('pages.Jobs.create-edit', compact('clients', 'vehicles'));
    }


    public function store(JobsStoreRequest $request)
    {
        Job::create($request->validated());

        return redirect()->route('jobs.index');
    }

  
    public function show(Job $job)
    {
        return view('pages.Jobs.show', compact('job'));
    }


    public function edit(Job $job)
    {
        $clients = Client::pluck('name', 'id');
        $vehicles = Vehicle::pluck('model', 'id');

        return view('pages.Jobs.create-edit', compact('job', 'clients', 'vehicles'));
    }


    public function update(JobsUpdateRequest $request, Job $job)
    {
        $job->update($request->validated());

        return redirect()->route('jobs.index');
    }


    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index');
    }
}
