@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Registrar producto
                        </h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('product.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Nombre">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="size" class="form-label">Tamaño</label>
                                        <select name="size" id="size" class="form-control">
                                            <option value="0">Seleccione Tamaño</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                        </select>
                                        @if ($errors->has('size'))
                                            <span class="text-danger">{{ $errors->first('size') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="brand_id" class="form-label">Marca</label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option value="">Seleccione Marca</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('brand_id'))
                                            <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="boarding_date" class="form-label">Fecha embarque</label>
                                        <input type="date" class="form-control" name="boarding_date"
                                            placeholder="Fecha de embarque">
                                        @if ($errors->has('boarding_date'))
                                            <span class="text-danger">{{ $errors->first('boarding_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="qty" class="form-label">Cantidad</label>
                                        <input type="number" class="form-control" name="qty" id="qty"
                                            placeholder="Cantidad">
                                        @if ($errors->has('qty'))
                                            <span class="text-danger">{{ $errors->first('qty') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Observación</label>
                                        <textarea class="form-control" name="comment" id="comment" placeholder="Observación"></textarea>
                                        @if ($errors->has('comment'))
                                            <span class="text-danger">{{ $errors->first('comment') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5>Listado de productos</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tamaño</th>
                                    <th scope="col">Observación</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Fecha embarque</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($products as $product)
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->size }}</td>
                                        <td>{{ $product->comment }}</td>
                                        <td>{{ $product->brand->name ?? '' }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->boarding_date }}</td>
                                        <td>
                                            <a href="{{ url('/product/edit/' . $product->id) }}"
                                                class="btn btn-primary">Editar
                                            </a>
                                            <a href="{{ url('/product/delete/' . $product->id) }}"
                                                class="btn btn-danger">Eliminar
                                            </a>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
