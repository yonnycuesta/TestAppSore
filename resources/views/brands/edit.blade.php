@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/brands') }}" class="btn btn-primary">Listado de marcas</a>
                        <h4 class="text-title mt-2">
                            Actualizar marca
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('brand/update/' . $brand->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nombre" value="{{ $brand->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="reference" class="form-label">Referencia</label>
                                <input type="text" class="form-control" name="reference" placeholder="Referencia"
                                    value="{{ $brand->reference }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
