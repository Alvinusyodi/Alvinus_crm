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

        // Count leads that are not approved
        $leadCount = Lead::where('status', '!=', 'approved')->count();

        // Count projects that are not approved or rejected
        $projectCount = Project::where('status', 'pending')->count();

        $customerCount = Customer::count();

        // Pass data to the view
        return view('/admin', compact('productCount', 'leadCount', 'projectCount', 'customerCount'));
    }
}
