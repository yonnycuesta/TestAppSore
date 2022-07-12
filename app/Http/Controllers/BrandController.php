<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brand\BrandStoreRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Models\Brand;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::paginate(5);
        return view('brands.index', compact('brands'));
    }

    public function store(BrandStoreRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->reference = $request->reference;
        $brand->save();
        return redirect()->route('brands.index')->with('brand-success', 'Marca creada correctamente');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(BrandUpdateRequest $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->reference = $request->reference;
        $brand->save();
        return redirect()->route('brands.index');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
