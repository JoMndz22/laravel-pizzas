<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizzas;
use App\Ingredientes;
use App\PizzaIngredientes;

class HomeController extends Controller{
    
    public function getHome() {
   		
   		$pizzas = Pizzas::all();
   		$ingredientes = Ingredientes::all();
   		$detalle = PizzaIngredientes::all();


	   	
		return view('welcome', compact(['pizzas','ingredientes','detalle']));	
	}
	
}
