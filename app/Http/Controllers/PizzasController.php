<?php

namespace App\Http\Controllers;

use App\Pizzas;
use Illuminate\Http\Request;
use App\Http\Resources\PizzaResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Pizzas\StoreRequest;

class PizzasController extends Controller
{
    protected $pizzas;

    /**
     * UserController constructor.
     * @param Pizzas $pizzas
     */
    public function __construct(Pizzas $pizzas)
    {
        $this->pizzas = $pizzas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PizzaResource::collection($this->pizzas->with('ingredientes')->paginate());

//        $datos['pizzas'] = Pizzas::paginate(10);
//
//        return view('pizzas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pizzas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return PizzaResource
     */
    public function store(StoreRequest $request)
    {
        $pizza = $this->pizzas->fill($request->except('imagen', 'ingredientes'));
        if($request->hasFile('imagen')){
            $pizza->imagen = $request->file('imagen')->store('uploads','public');
        }
        $pizza->save();
        $pizza->ingredientes()->attach($request->ingredientes);
        return new PizzaResource($pizza);

//        return redirect('pizzas')->with('mensaje','¡Pizza agregada con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param Pizzas $pizza
     * @return PizzaResource
     */
    public function show(Pizzas $pizza)
    {
        return new PizzaResource($pizza);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pizzas  $pizzas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pizza = Pizzas::findOrFail($id);

        return view('pizzas.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreRequest $request
     * @param Pizzas $pizza
     * @return PizzaResource
     */
    public function update(Request $request, Pizzas $pizza)
    {
        $pizza->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            Storage::delete('public/'.$pizza->imagen);

            $pizza->imagen = $request->file('imagen')->store('uploads','public');
        }
        $pizza->update();
        $pizza->ingredientes()->sync($request->ingredientes);

        return new PizzaResource($pizza);
//        return redirect('pizzas')->with('mensaje','¡Pizza modificada con éxito!');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pizzas $pizza
     * @return PizzaResource
     * @throws \Exception
     */
    public function destroy(Pizzas $pizza)
    {

        Storage::delete('public/'.$pizza->imagen);
        $pizza->delete();

        return new PizzaResource($pizza);

//        return redirect('pizzas')->with('mensaje','¡Pizza Eliminada!');;
    }
}
