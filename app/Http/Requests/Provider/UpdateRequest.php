<?php

namespace App\Http\Requests\Provider;

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
            'name'=>'required|unique:providers,name'. 
            $this->route('provider')->id.'|string|max:255',
            
            'email'=>'required|email|string|unique:providers,email'. 
            $this->route('provider')->id.'|max:255',

            'ruc_number'=>'required|string|min:11|unique:providers,ruc_number'. 
            $this->route('provider')->id.'|max:11',


            'address'=>'nullable|string|max:255',

            'phone'=>'required|string|min:9|unique:providers,phone'. 
            $this->route('provider')->id.'|max:9',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'este campo es requerido',
            'name.unique'=>'El provedor ya esta registrado',
            'name.string'=>'el valor no es correcto',
            'name.max'=>'solo se permite 50 caracteres',
            
            'email.required'=>'Este campo es requerido',
            'email.email'=>'No es un correo electronico',
            'email.string'=>'el valor no es correcto',
            'email.max'=>'solo se permite 255 caracteres',
            'email.unique'=>'Ya se encuentra registrado',

            'ruc_number.required'=>'Este campo es requerido',
            'ruc_number.string'=>'Este valor no es correcto',
            'ruc_number.max'=>'solo se permiten 11 caracteres',
            'ruc_number.min'=>'Se requeire 9 caracteres',
            'ruc_number.unique'=>'Ya se encuentra registrado',

            'address.string'=>'Solo se permiten 255 caracteres',
            'address.'=>'El valor no es correcto',

            'phone.required'=>'Este campo es requerido',
            'phone.string'=>'El valor no es correcto',
            'phone.max'=>'Solo se permiten 9 caracteres',
            'phone.min'=>'Se requeire 9 caracteres',
            'phone.unique'=>'Ya se encuentra registrado',
        ];
    }
}
