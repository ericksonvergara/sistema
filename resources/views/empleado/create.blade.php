FORMULARIO DE CREACION DEL EMPLEADO

<form action="{{ url('/empleado') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="Nombre"> Nombre </label>
    <input type="text" name="Nombre" id="Nombre">
    <br>
    <label for="ApellidoPaterno"> Apellido Paterno </label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno">
    <br>
    <label for="ApellidoMaterno"> Apellido Materno </label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno">
    <br>
    <label for="NumeroDocumento"> Numero Documento </label>
    <input type="text" name="NumeroDocumento" id="NumeroDocumento">
    <br>
    <label for="Correo"> Correo </label>
    <input type="text" name="Correo" id="Correo">
    <br>
    <label for="Direccion"> Direccion </label>
    <input type="text" name="Direccion" id="Direccion">
    <br>
    <label for="Telefono"> Telefono </label>
    <input type="text" name="Telefono" id="Telefono">
    <br>
    <label for="Genero"> Genero </label>
    <input type="text" name="Genero" id="Genero">
    <br>
    <label for="Foto"> Subir Foto</label>
    <input type="file" name="Foto" id="Foto">
    <br>
    <input type="submit" value="Guardar datos">
</form>
