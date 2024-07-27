<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Lead;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Customer;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
    public function manager()
    {
        $productCount = Product::count();
        $leadCount = Lead::count();
        $projectCount = Project::count();
        $customerCount = Customer::count(); // Menghitung total pelanggan

        return view('admin', compact('productCount', 'leadCount', 'projectCount', 'customerCount'));
    }
    public function sales()
    {
        $productCount = Product::count();
        $leadCount = Lead::count();
        $projectCount = Project::count();
        $customerCount = Customer::count(); // Menghitung total pelanggan

        return view('admin', compact('productCount', 'leadCount', 'projectCount', 'customerCount'));
    }
}
