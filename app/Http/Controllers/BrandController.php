<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brand\BrandStoreRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Models\Brand;

class BrandController extends Controller
{

    /**
     *La función de índice es una función que devuelve una vista de la página de índice de marcas
     *
     *@return Una vista llamada marcas.index con una variable llamada marcas
     */
    public function index()
    {
        $brands = Brand::paginate(5);
        return view('brands.index', compact('brands'))->with('brand-success', 'La marca se ha guardado correctamente');
    }

    /**
     *Creamos una nueva instancia del modelo Brand, asignamos los valores de la solicitud a los del modelo
     *atributos, y luego guardamos el modelo
     *
     *@param BrandStoreRequest solicitud El objeto de la solicitud.
     *
     *@return Una redirección a la ruta marcas.index con un mensaje flash.
     */
    public function store(BrandStoreRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->reference = $request->reference;
        $brand->save();
        return redirect()->route('brands.index')->with('brand-success', 'Marca creada correctamente');
    }

    /**
     *La función de edición toma la identificación de una marca y devuelve una vista con la marca
     *
     *@param id El id de la marca que queremos editar.
     *
     *@return Se devuelve la vista de edición.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brands.edit', compact('brand'));
    }

    /**
     *Toma una solicitud, encuentra la marca con la identificación de la solicitud, actualiza la marca con el
     *nombre y referencia de la solicitud, y luego redirige a la página de índice
     *
     *@param BrandUpdateRequest solicitud El objeto de la solicitud.
     *@param id El id de la marca a actualizar.
     *
     *@return La ruta a la página de índice de las marcas.
     */
    public function update(BrandUpdateRequest $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->reference = $request->reference;
        $brand->update();
        return redirect()->route('brands.index');
    }

    /**
     *La función toma una identificación como parámetro, encuentra la marca con esa identificación, la elimina y luego
     *redirige a la página de índice
     *
     *@param id El id de la marca a eliminar.
     *
     *@return Se elimina la marca y se redirige al usuario a la página de índice.
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        if ($brand->products->count() > 0) {
            return redirect()->route('brands.index')->with('brand-error', 'La marca no se puede eliminar porque tiene productos asociados');
        } else {
            $brand->delete();
            return redirect()->route('brands.index')->with('brand-deleted', 'La marca se ha eliminado correctamente');
        }
    }
}
