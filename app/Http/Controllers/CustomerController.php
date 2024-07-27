<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Lead;
use App\Models\Product;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('lead', 'product')->get();
        return view('customers.index', compact('customers'));
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $leads = Lead::all();
        $products = Product::all();
        return view('customers.edit', compact('customer', 'leads', 'products'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
