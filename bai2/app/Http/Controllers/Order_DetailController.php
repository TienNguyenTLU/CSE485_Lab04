<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Customer;

class Order_DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // If you have a relationship like 'order' or another relationship on Order_Detail, 
        // load it accordingly. Assuming there's no such relation in this case:
        $order_details = Order_Detail::paginate(5); 
        return view('order_details.index', compact('order_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Logic for creating an order detail goes here
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic for storing the new order detail goes here
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Logic for displaying a single order detail goes here
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order_details = Order_Detail::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();

        return view('order_details.edit', compact('order_details', 'customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Logic for updating the order detail goes here
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Logic for deleting the order detail goes here
    }
}
