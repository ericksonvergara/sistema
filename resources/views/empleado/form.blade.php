<h1> {{ $modo }} empleado</h1>
<br>
@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>



@endif

<div class="form-group">
    <label for="Nombre"> Nombre </label>
    <input type="text" class="form-control" name="Nombre"
        value="{{ isset($empleado->Nombre) ? $empleado->Nombre : old('Nombre') }}" id="Nombre">

</div>

<div class="form-group">
    <label for="ApellidoPaterno"> Apellido Paterno </label>
    <input type="text" class="form-control" name="ApellidoPaterno"
        value="{{ isset($empleado->ApellidoPaterno) ? $empleado->ApellidoPaterno : old('ApellidoPaterno') }}" id="ApellidoPaterno">

</div>

<div class="form-group">
    <label for="ApellidoMaterno"> Apellido Materno </label>
    <input type="text" class="form-control" name="ApellidoMaterno"
        value="{{ isset($empleado->ApellidoMaterno) ? $empleado->ApellidoMaterno : old('ApellidoMaterno') }}" id="ApellidoMaterno">

</div>

<div class="form-group">
    <label for="NumeroDocumento"> Numero Documento </label>
    <input type="text" class="form-control" name="NumeroDocumento"
        value="{{ isset($empleado->NumeroDocumento) ? $empleado->NumeroDocumento : old('NumeroDocumento') }}" id="NumeroDocumento">

</div>

<div class="form-group">
    <label for="Correo"> Correo </label>
    <input type="text" class="form-control" name="Correo"
        value="{{ isset($empleado->Correo) ? $empleado->Correo : old('Correo') }}" id="Correo">

</div>

<div class="form-group">
    <label for="Direccion"> Direccion </label>
    <input type="text" class="form-control" name="Direccion"
        value="{{ isset($empleado->Direccion) ? $empleado->Direccion : old('Direccion') }}" id="Direccion">

</div>

<div class="form-group">
    <label for="Telefono"> Telefono </label>
    <input type="text" class="form-control" name="Telefono"
        value="{{ isset($empleado->Telefono) ? $empleado->Telefono : old('Telefono') }}" id="Telefono">

</div>

<div class="form-group">
    <label for="Genero"> Genero </label>
    <input type="text" class="form-control" name="Genero"
        value="{{ isset($empleado->Genero) ? $empleado->Genero : old('Genero') }}" id="Genero">
    <br>
</div>

<div class="form-group">
    <label for="Foto"></label>
    @if (isset($empleado->Foto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleado->Foto }}" width="100"
            alt="">
    @endif
    <input type="file" class="form-control" name="Foto" value="" id="Foto">
    <br>
</div>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a class="btn btn-primary" href="{{ url('empleado/') }}">Regresar</a>
