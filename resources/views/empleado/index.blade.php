@extends('layouts.app')

@section('content')
    <div class="container">

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif




        <a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo empleado</a>
        <br>
        <br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Numero Documento</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Genero</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleado->Foto }}"
                                width="100" alt="">
                        </td>
                        <td>{{ $empleado->Nombre }}</td>
                        <td>{{ $empleado->ApellidoPaterno }}</td>
                        <td>{{ $empleado->ApellidoMaterno }}</td>
                        <td>{{ $empleado->NumeroDocumento }}</td>
                        <td>{{ $empleado->Correo }}</td>
                        <td>{{ $empleado->Telefono }}</td>
                        <td>{{ $empleado->Direccion }}</td>
                        <td>{{ $empleado->Genero }}</td>
                        <td>

                            <a href="{{ url('/empleado/' . $empleado->id . '/edit') }}" class="btn btn-warning">
                                Editar
                            </a>
                            |

                            <form action="{{ url('/empleado/' . $empleado->id) }}" class="d-inline" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')"
                                    value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {!! $empleados->links() !!}
    </div>
@endsection
