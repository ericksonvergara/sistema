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
                <td>{{$empleado->id}}</td>
                <td>{{$empleado->Foro}}</td>
                <td>{{$empleado->Nombre}}</td>
                <td>{{$empleado->ApellidoPaterno}}</td>
                <td>{{$empleado->ApellidoMaterno}}</td>
                <td>{{$empleado->NumeroDocumento}}</td>
                <td>{{$empleado->Correo}}</td>
                <td>{{$empleado->Telefono}}</td>
                <td>{{$empleado->Direccion}}</td>
                <td>{{$empleado->Genero}}</td>
                <td>Editar
                    <form action="{{ url('/empleado/'.$empleado->id)}}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borra">
                    </form>
                </td>
            </tr>

        @endforeach

    </tbody>
</table>
