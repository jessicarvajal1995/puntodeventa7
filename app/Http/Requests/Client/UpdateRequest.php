<?php

namespace App\Http\Requests\Client;

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

            'name'=>'string|required|max:255', 

            'dni'=>'string|required|unique:clients,dni'. 
            $this->route('client')->id.'|max:8', 

            'ruc'=>'string|nullable|unique:clients,ruc'. 
            $this->route('client')->id.'|max:11',

            'address'=>'string|nullable|max:255',

            'phone'=>'string|nullable|unique:clients,phone'. 
            $this->route('client')->id.'|max:9',

            'email'=>'string|nullable|unique:clients,email'. 
            $this->route('client')->id.'|max:255|email:rfc,dns',

        ];
    } 
    public function messages(){
        return[
            
            'name.string'=>'Este campo no es correcto',
            'name.required'=>'Este campo es requerido',
            'name.max'=>'Se permiten 255 caracteres',

            'dni.string'=>'Este campo no es correcto',
            'dni.required'=>'Este campo es requerido',
            'dni.unique'=>'El cliente ya esta registrado',
            'dni.max'=>'Solo se permiten 8 caracteres',

            'ruc.string'=>'Este campo no es correcto',
            'ruc.unique'=>'El cliente ya esta registrado',
            'ruc.max'=>'Solo se permiten 11 caracteres',

            'address.string'=>'Este campo no es correcto',
            'address.max'=>'Solo se permiten 255 caracteres',

            'phone.string'=>'Este campo no es correcto',
            'phone.unique'=>'El cliente ya esta registrado',
            'phone.max'=>'Se permiten 9 caracteres',

            'email.string'=>'Este campo no es correcto',
            'email.unique'=>'El cliente ya esta registrado',
            'email.max'=>'Solo se permiten 255 caracteres',
            'email.email'=>'No es un correo Electronico',


        ];
    }
}
