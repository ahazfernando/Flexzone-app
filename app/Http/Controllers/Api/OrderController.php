<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::all();
        return response()->json($cartItems);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:items,id',
            'pro_name' => 'required',
            'pro_price' => 'required|numeric',
            'cus_name' => 'required',
            'cus_email' => 'required|email',
            'cus_phone' => 'required',
            'cus_address' => 'required',
        ]);

        $cartItem = Cart::create($request->all());
        return response()->json($cartItem, 201);
    }

    public function show($id)
    {
        $cartItem = Cart::findOrFail($id);
        return response()->json($cartItem);
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        $request->validate([
            'pro_price' => 'numeric',
            'cus_email' => 'email',
        ]);

        $cartItem->update($request->all());
        return response()->json($cartItem);
    }

    public function delete($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        return response()->json(null, 204);
    }
}