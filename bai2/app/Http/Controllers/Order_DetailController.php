<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;

class Order_DetailController extends Controller
{
    public function index()
    {
        $order_details = Order_Detail::with('order', 'product')->paginate(5);
        return view('order_details.index', compact('order_details'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('order_details.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        Order_Detail::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        $product = Product::find($request->product_id);
        $product->decrement('quantity', $request->quantity);

        return redirect()->route('order_details.index');
    }

    public function show($id)
    {
        $order_detail = Order_Detail::with('order', 'product')->findOrFail($id);
        return view('order_details.show', compact('order_detail'));
    }

    public function edit($id)
    {
        $order_detail = Order_Detail::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();

        return view('order_details.edit', compact('order_detail', 'customers', 'products'));
    }

    public function update(Request $request, $id)
    {
        $order_detail = Order_Detail::findOrFail($id);

        $order_detail->update([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        $product = Product::find($request->product_id);
        $old_quantity = $order_detail->getOriginal('quantity');
        $product->increment('quantity', $old_quantity - $request->quantity);

        return redirect()->route('order_details.index');
    }

    public function destroy($id)
    {
        $order_detail = Order_Detail::findOrFail($id);
        $product = Product::find($order_detail->product_id);
        $product->increment('quantity', $order_detail->quantity);

        $order_detail->delete();

        return redirect()->route('order_details.index');
    }
}
