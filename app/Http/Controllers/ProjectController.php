<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Product;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('product', 'lead')->where('status', 'pending')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $products = Product::all();
        $leads = Lead::where('status', 'pending')->get();
        return view('projects.create', compact('products', 'leads'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'lead_id' => 'required|exists:leads,id',
            'description' => 'required|string',
        ]);

        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $products = Product::all();
        $leads = Lead::all();
        return view('projects.edit', compact('project', 'products', 'leads'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'lead_id' => 'required|exists:leads,id',
            'description' => 'required|string',
        ]);

        $project->update($validated);

        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Project not found');
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }

    // Metode untuk approve proyek
    public function approve($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 'approved';
        $project->save();

        $lead = $project->lead;
        $lead->status = 'approved';
        $lead->save();

        // Add lead to customers
        Customer::create([
            'lead_id' => $lead->id,
            'product_id' => $project->product->id,
            'name' => $lead->name,
            'email' => $lead->email,
            'phone' => $lead->phone,
            'service' => $project->product->name,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project and Lead approved successfully');
    }

    public function reject($id)
    {
        $project = Project::findOrFail($id);
        $project->status = 'rejected';
        $project->save();

        $lead = $project->lead;
        $lead->status = 'rejected';
        $lead->save();

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil di-reject.');
    }
}
