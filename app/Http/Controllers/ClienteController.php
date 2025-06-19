<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientes=Cliente::all();
        return view("clientes.index",compact("clientes"));
    }
    /**
     * funsion que renderiza el mapa con las ubicaciones(lat/lon)
     * de todos los clientes
     */
    public function mapa()
    {
        //
        $clientes=Cliente::all();
        return view("clientes.mapa",compact("clientes"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //renderisando el formulario para crear clientes
        return view('clientes.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //captural valores y almarnlos
        $datos=[
            'cedula'=> $request->cedula,
            'apellido'=> $request->apellido,
            'nombre'=> $request->nombre,
            'latitud'=> $request->latitud,
            'longitud'=> $request->longitud,
        ];
        Cliente::create($datos);
        return redirect() ->route('clientes.index');
    }

   /**public function store(Request $request)
    {
        // Validar los datos (opcional pero recomendado)
        $request->validate([
            'cedula' => 'required|unique:clientes,cedula',
            'apellido' => 'required',
            'nombre' => 'required',
            // otros campos si los tienes
        ]);

        // Crear cliente
        Cliente::create([
            'cedula'=> $request->cedula,
            'apellido'=> $request->apellido,
            'nombre'=> $request->nombre,
            'latitud'=> $request->latitud,
            'longitud'=> $request->longitud,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente registrado correctamente');
    }*/


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //editar
        $cliente = Cliente::findOrFail($id);
        return view('clientes.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //eliminar
        $cliente = Cliente::findOrFail($id);
        $cliente->update([
            'cedula' => $request->cedula,
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ]);
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //deve ir para que elimine
         $cliente = Cliente::findOrFail($id);
        $cliente->delete();

         return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');

    }
}
