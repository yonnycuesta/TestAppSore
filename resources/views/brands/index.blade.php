@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Registrar marca
                        </h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('brand.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nombre">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="reference" class="form-label">Referencia</label>
                                <input type="text" class="form-control" name="reference" placeholder="Ejemplo: abc123">
                                @if ($errors->has('reference'))
                                    <span class="text-danger">{{ $errors->first('reference') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Listado de marcas</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Referencia</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($brands as $brand)
                                        <th scope="row">{{ $brand->id }}</th>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->reference }}</td>
                                        <td>
                                            <a href="{{ url('/brand/edit/' . $brand->id) }}"
                                                class="btn btn-primary">Editar
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('/brand/delete/' . $brand->id) }}"
                                                class="btn btn-danger">Eliminar
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('brand-success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "timeOut": "3000",
            };
            toastr.success("{{ Session::get('brand-success') }}");
        </script>
    @endif
@endsection
