<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        $products = Product::all();
        return view('products.index', compact('products', 'brands'));
    }

    public function store(ProductStoreRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->size = $request->size;
        $product->comment = $request->comment;
        $product->brand_id = $request->brand_id;
        $product->qty = $request->qty;
        $product->boarding_date = $request->boarding_date;
        $product->save();
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        return view('products.edit', compact('product', 'brands'));
    }

    public function update(ProductStoreRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->size = $request->size;
        $product->comment = $request->comment;
        $product->brand_id = $request->brand_id;
        $product->qty = $request->qty;
        $product->boarding_date = $request->boarding_date;
        $product->update();
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
