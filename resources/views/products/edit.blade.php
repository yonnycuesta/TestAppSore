@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('/products') }}" class="btn btn-primary">Listado de productos</a>
                        <h4 class="text-title mt-2">
                            Actualizar producto
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/product/update/' . $product->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Nombre" value="{{ $product->name }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="size" class="form-label">Tamaño</label>
                                        <option value="0">Seleccione Tamaño</option>
                                        <select name="size" id="size" class="form-control">
                                            @if ($product->size == 'S')
                                                <option value="S" selected>S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                            @elseif ($product->size == 'M')
                                                <option value="S">S</option>
                                                <option value="M" selected>M</option>
                                                <option value="L">L</option>
                                            @elseif ($product->size == 'L')
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L" selected>L</option>
                                            @else
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                            @endif

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
                                                <option value="{{ $brand->id }}"
                                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('brand_id'))
                                            <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="boarding_date" class="form-label">Fecha embarque</label>
                                        <input type="date" class="form-control" name="boarding_date"
                                            placeholder="Fecha de embarque" value="{{ $product->boarding_date }}">
                                        @if ($errors->has('boarding_date'))
                                            <span class="text-danger">{{ $errors->first('boarding_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="qty" class="form-label">Cantidad</label>
                                        <input type="number" class="form-control" name="qty" id="qty"
                                            placeholder="Cantidad" value="{{ $product->qty }}">
                                        @if ($errors->has('qty'))
                                            <span class="text-danger">{{ $errors->first('qty') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Observación</label>
                                        <textarea class="form-control" name="comment" id="comment" placeholder="Comentario">
                                            {{ $product->comment }}
                                        </textarea>
                                        @if ($errors->has('comment'))
                                            <span class="text-danger">{{ $errors->first('comment') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
