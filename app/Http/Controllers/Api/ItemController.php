<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_description' => 'required',
            'product_category' => 'required',
            'product_quantity' => 'required|integer',
        ]);

        $item = Item::create($request->all());

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);
            $item->product_image = $imageName;
            $item->save();
        }

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_description' => 'required',
            'product_category' => 'required',
            'product_quantity' => 'required|integer',
        ]);

        $item->update($request->all());

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);
            $item->product_image = $imageName;
            $item->save();
        }

        return response()->json($item);
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return response()->json(null, 204);
    }
}