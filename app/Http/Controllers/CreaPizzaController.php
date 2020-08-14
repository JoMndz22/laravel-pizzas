<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredientes;

class CreaPizzaController extends Controller{
    public function index() {
   		
   		$ingredientes = Ingredientes::all();
	   	
		return view('creapizza', compact('ingredientes'));	
	}
	
}
