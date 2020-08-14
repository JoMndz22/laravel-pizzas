<?php

namespace App\Http\Controllers;

use App\Sucursales;
use Illuminate\Http\Request;

class SucursalesBladeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sucursales = Sucursales::all();

        return view('sucursales', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sucursales.create');
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
        $campos = [
                'Nombre'=> 'required|string',
                'Direccion'=> 'required|string',
                'Horario'=> 'required|string',
                'Telefonos'=> 'required|string'
            ];
        $msj = ["required"=> 'El campo :attribute es requerido'];
        $this->validate($request,$campos,$msj); 

        $datos =  request()->except('_token');
        Sucursales::insert($datos);

        return redirect('sucursales')->with('mensaje','¡¡Ingrediente agregado con éxito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursales $sucursale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sucursal = Sucursales::findOrFail($id);

        return view('sucursales.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $datos =  request()->except(['_token','_method']);        
        Sucursales::where('id','=',$id)->update($datos);

        return redirect('sucursales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal = Sucursales::findOrFail($id);
        
        
        Sucursales::destroy($id);
            

        return redirect('sucursales');
    }
}
