<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'NumeroDocumento'=>'required|string|max:12',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:100',
            'Telefono'=>'required|string|max:11',
            'Genero'=>'required|string|max:20',
            'Foto'=>'required|max:10000|mimes:jpeg,jpg,png',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida',
        ];

        $this->validate($request, $campos, $mensaje);
        //$datosEmpleados = request()->all();
        $datosEmpleados = request()->except('_token');
        if ($request->hasFile('Foto')) {
            $datosEmpleados['Foto']=$request->file('Foto')->store('uploads','public');
            # code...
        }
        Empleado::insert($datosEmpleados);
        //return response()->json($datosEmpleados);
        return redirect('empleado')->with('mensaje','Empleado agregado con exito!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'NumeroDocumento'=>'required|string|max:12',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:100',
            'Telefono'=>'required|string|max:11',
            'Genero'=>'required|string|max:20',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        if ($request->hasFile('Foto')) {
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,jpg,png'];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos, $mensaje);
        //
        $datosEmpleados = request()->except(['_token','_method']);

        if ($request->hasFile('Foto')) {
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleados['Foto']=$request->file('Foto')->store('uploads','public');
            # code...
        }

        Empleado::where('id','=',$id)->update($datosEmpleados);

        $empleado = Empleado::findOrFail($id);
        //return view('empleado.edit', compact('empleado'));

        return redirect('empleado')->with('mensaje','Empleado editado correctamente!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        if (Storage::delete('public/'.$empleado->Foto)) {
            Empleado::destroy($id);
            # code...
        }

        return redirect('empleado')->with('mensaje','Empleado borrado!.');
    }
}
