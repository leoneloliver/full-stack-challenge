<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller {
    public function index() {
        $jobs = Job::with('company')->orderBy('created_at', 'desc')->get();
        return view('jobs.index', compact('jobs'));
    }
}
