<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sucursales\StoreRequest;
use App\Http\Resources\SucursalesResource;
use App\Sucursales;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    protected $sucursales;

    /**
     * UserController constructor.
     * @param Sucursales $sucursales
     */
    public function __construct(Sucursales $sucursales)
    {
        $this->sucursales = $sucursales;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return SucursalesResource::collection($this->sucursales->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return SucursalesResource
     */
    public function store(StoreRequest $request)
    {
        $sucursal = $this->sucursales->fill($request->all());
        $sucursal->save();

        return new SucursalesResource($sucursal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursales  $sucursales
     * @return SucursalesResource
     */
    public function show(Sucursales $sucursale)
    {
        return new SucursalesResource($sucursale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sucursales  $sucursales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursales  $sucursales
     * @return SucursalesResource
     */
    public function update(Request $request, $id)
    {
        $datos =  request()->except(['_token','_method']);
        
        Sucursales::where('id','=',$id)->update($datos);

        return new SucursalesResource($sucursales);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursales  $sucursales
     * @return SucursalesResource
     */
    public function destroy(Sucursales $sucursale)
    {
        $sucursale->delete();

        return new SucursalesResource($sucursale);
    }
}
