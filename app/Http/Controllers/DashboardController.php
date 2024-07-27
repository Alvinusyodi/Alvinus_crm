<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Lead;
use App\Models\Project;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve counts
        $productCount = Product::count();
        $leadCount = Lead::count();
        $projectCount = Project::count();
        $customerCount = Customer::count();

        // Pass data to the view
        return view('/admin', compact('productCount', 'leadCount', 'projectCount', 'customerCount'));
    }
}
