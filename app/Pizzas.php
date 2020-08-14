<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizzas extends Model
{
    protected $guarded = [];

    public function ingredientes()
    {
        return $this->belongsToMany(Ingredientes::class, 'pizza_ingredientes', 'pizza_id', 'ingredientes_id');
    }
}
