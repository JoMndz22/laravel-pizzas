<?php

namespace App\Http\Controllers;

use App\Pizzas;
use App\User;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    /**
     * UserController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param StoreRequest $request
     * @return User
     */
    public function store(StoreRequest $request)
    {
        $user = $this->user->fill($request->all());
        $user->save();

        return $user;
    }

    public function pedido(Request $request)
    {           
        
        $totalPizza = 0;
        $totalIngredientes = 0;
        $pizzasTotal = [];
        $pizzas = Pizzas::whereIn('id', $request->pizzas)->with('ingredientes')->get();
        collect($pizzas)->each(function ($pizza) use (&$totalPizza, &$totalIngredientes, &$pizzasTotal) {
            $pizzaValor = 0;
            $ingredientesValor = 0;
            collect($pizza->ingredientes)->each(function ($ingrediente) use (&$totalIngredientes, &$ingredientesValor) {
                $totalIngredientes += $ingrediente->precio;
                $ingredientesValor += $ingrediente->precio;
            });
            $totalPizza += $pizza->precio;
            $pizzaValor = $pizza->precio;
            array_push($pizzasTotal, [
                'pizza' => $pizza->nombre,
                'ingredientes' => $pizza->ingredientes->pluck('nombre'),
                'subtotal' => $ingredientesValor + $pizzaValor
            ]);
        });



        return response([
            'numero de orden:' => "#". random_int(13349, 99999),
            'orden' => $pizzasTotal,
            'total' => "$" . number_format($totalPizza + $totalIngredientes, 2),
        ]);
    }
}
