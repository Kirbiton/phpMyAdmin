<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exist:users,id',
            'product_id' => 'required|exist:product,id',
            'quantity' =>  'required|integer|min:1',
        ]);
        
        $order = Order::create($request->all());

        return response()->json($order, 201);
    }

    public function index()
    {
        return Order::with(['user','product'])->get();
    }

    public function show($id)
    {
        return Order::with(['user','product'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order ->update($request->all());
        
        return response()->json($order);
    }    

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(null,204)
    }
}
