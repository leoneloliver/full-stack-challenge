<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobListController extends Controller {
    public function index() {
        $companies = Company::with('joblists')->get();

        return response()->json([
            'companies' => $companies
        ]);
    }
}
