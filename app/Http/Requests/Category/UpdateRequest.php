<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required|string|unique:categories,name'. 
            $this->route('category')->id.'|max:50',
            'description'=>'nullable|string|max:250',
        ];
    }
    public function messages(){
        return[
            'name.required'=>'este campo es requerido',
            'name.unique'=>'El cliente ya esta registrado',
            'name.string'=>'el valor no es correcto',
            'name.max'=>'solo se permite 50 caracteres',
            'description.string'=>'el valor no es correcto',
            'description.max'=>'solo se permite 255 caracteres'
        ];
    }
}
