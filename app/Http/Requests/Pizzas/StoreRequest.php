<?php

namespace App\Http\Requests\Pizzas;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'string'],
            'precio' => ['required', 'numeric'],
            'imagen' => ['required', 'max:1000', 'mimes:jpg,png,jpeg'],
            'descripcion' => ['required'],
            'ingredientes' => ['required'],
        ];
    }
}
