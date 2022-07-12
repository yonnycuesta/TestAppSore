<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{

    /**
     *La función de índice devuelve una vista de todos los productos, paginados por 4, y todas las marcas
     *
     *@return Se devuelve la vista de índice.
     */
    public function index()
    {
        $brands = Brand::all();
        $products = Product::paginate(4);
        return view('products.index', compact('products', 'brands'));
    }

   /**
    *La función toma un objeto de solicitud, crea un nuevo producto, asigna los datos de la solicitud al
    *producto, y guarda el producto
    *
    *@param ProductStoreRequest solicitud El objeto de la solicitud.
    *
    *@return El producto se está guardando en la base de datos.
    */
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
        return redirect()->route('products.index')->with('product-success', 'El producto se ha guardado correctamente');
    }

   /**
    *La función de edición toma la identificación de un producto y devuelve una vista con el producto y todos los
    *marcas
    *
    *@param id El id del producto que queremos editar.
    *
    *@return Se devuelve la vista de edición.
    */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        return view('products.edit', compact('product', 'brands'));
    }

   /**
    *La función toma un ProductStoreRequest, que es una solicitud de formulario, y una identificación, y luego encuentra el
    *producto con esa identificación, y luego actualiza el producto con los datos de la solicitud de formulario.
    *
    *@param ProductStoreRequest solicitud El objeto de la solicitud.
    *@param id El id del producto a actualizar.
    *
    *@return El producto se actualiza y luego se redirige a la página de índice de productos.
    */
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

  /**
    *La función toma una identificación como parámetro, encuentra el producto con esa identificación, lo elimina y luego
    *redirige a la página de índice
    *
    *@param id El id del producto a eliminar.
    *
    *@return El producto se está eliminando de la base de datos.
    */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('product-deleted', 'El producto se ha eliminado correctamente');
    }
}
