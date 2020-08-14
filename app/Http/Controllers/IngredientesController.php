<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingredientes\StoreRequest;
use App\Http\Resources\IngredientesResource;
use App\Ingredientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IngredientesController extends Controller
{
    protected $ingredintes;

    /**
     * IngredientesController constructor.
     * @param Ingredientes $ingredintes
     */
    public function __construct(Ingredientes $ingredintes)
    {
        $this->ingredintes = $ingredintes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {   

        return IngredientesResource::collection($this->ingredintes->paginate());

        //$datos['ingredientes'] = Ingredientes::paginate(10);
        //return view('ingredientes.index', $datos);


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return IngredientesResource
     */
    public function store(StoreRequest $request)
    {
        $ingrediente = $this->ingredintes->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $ingrediente->imagen = $request->file('imagen')->store('uploads','public');
        }

        $ingrediente->save();

        return new IngredientesResource($ingrediente);

        //return response()->json($datosIngredientes);
        //return redirect('ingredientes')->with('mensaje','¡¡Ingrediente agregado con éxito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param Ingredientes $ingrediente
     * @return IngredientesResource
     */
    public function show(Ingredientes $ingrediente)
    {

        return new IngredientesResource($ingrediente);
        //Rreturn $ingrediente;
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param StoreRequest $request
     * @param Ingredientes $ingrediente
     * @return IngredientesResource
     */
    public function update(StoreRequest $request, Ingredientes $ingrediente)
    {
        $ingrediente->fill($request->except('imagen'));
        if($request ->hasFile('imagen')){
            Storage::delete('public/'.$ingrediente->imagen);//Eliminar imagen dando ruta
            $ingrediente->imagen = $request->file('imagen')->store('uploads','public');
        }
        $ingrediente->update();

        return new IngredientesResource($ingrediente);
        //return redirect('ingredientes')->with('mensaje','¡¡Ingrediente modificado con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ingredientes $ingrediente
     * @return IngredientesResource
     */
    public function destroy(Ingredientes $ingrediente)
    {
        Storage::delete('public/'.$ingrediente->imagen);
        $ingrediente->delete();

        return new IngredientesResource($ingrediente);

        //return redirect('ingredientes')->with('mensaje','¡¡Ingrediente eliminado con éxito!!');
    }

   
}
