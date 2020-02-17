<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Company;

class CompanyController extends Controller
{
    
    public function index()
    {
        return Company::with('contacts', 'contacts.phones')->get();
    }
}
