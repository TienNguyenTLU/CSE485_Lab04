<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('orders')->paginate(5); 
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $oders = Order::all();
        return view('orders.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('order_details.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();
        return redirect()->route('orders.index')->with('success', 'Đồ án đã được xóa thành công!');
    }
}
