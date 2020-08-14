<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredientes;
use Illuminate\Support\Facades\Storage;


class IngredientesBladeController extends Controller
{
    //
	public function index()
    {
        $datos['ingredientes'] = Ingredientes::paginate(10);

        return view('ingredientes.index', $datos);
    }

    
    public function create()
    {
        return view('ingredientes.create');
    }

    
    public function store(Request $request)
    {
        //validaciones
        $campos = [
                'Nombre'=> 'required|string',
                'Precio'=> 'required|string',
                'Imagen'=> 'required|max:1000|mimes:jpg,png,jpeg'
            ];
        $msj = ["required"=> 'El campo :attribute es requerido'];
        $this->validate($request,$campos,$msj); 


        //$datosIngredientes = request()->all();
        $datosIngredientes =  request()->except('_token');

        if($request ->hasFile('Imagen')){
            $datosIngredientes['Imagen'] = $request->file('Imagen')->store('uploads','public');
        }

        Ingredientes::insert($datosIngredientes);

        //return response()->json($datosIngredientes);
        return redirect('ingredientes')->with('mensaje','¡¡Ingrediente agregado con éxito!!');
    }

       
    public function edit($id)
    {
        //
        $ingrediente = Ingredientes::findOrFail($id);

        return view('ingredientes.edit', compact('ingrediente'));
    }

    
    public function update(Request $request, $id)
    {
        //
        $datosIngredientes =  request()->except(['_token','_method']);

        if($request ->hasFile('Imagen')){
            $ingrediente = Ingredientes::findOrFail($id); //Busca ingrediente por ID
            Storage::delete('public/'.$ingrediente->imagen);//Eliminar imagen dando ruta

            $datosIngredientes['Imagen'] = $request->file('Imagen')->store('uploads','public');
        }

        Ingredientes::where('id','=',$id)->update($datosIngredientes);


        //$ingrediente = Ingredientes::findOrFail($id);
        //return view('ingredientes.edit', compact('ingrediente'));
        return redirect('ingredientes')->with('mensaje','¡¡Ingrediente modificado con éxito!!');
    }

    
    public function destroy($id)
    {
        //
        $ingrediente = Ingredientes::findOrFail($id);
        
        if(Storage::delete('public/'.$ingrediente->imagen)){
            Ingredientes::destroy($id);
        }

        

        return redirect('ingredientes')->with('mensaje','¡¡Ingrediente eliminado con éxito!!');
    }
}
