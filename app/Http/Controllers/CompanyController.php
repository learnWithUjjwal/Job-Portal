<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function show($id, Company $company){
        $jobs = $company->jobs;
        return view('companies.show', compact('company', 'jobs'));
    }
}
