<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'=>'required|min:3|max:255',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'El campo del Nombre es obligatorio',
            'name.min'=>'El campo del Nombre minimo 3 caracteres',
            'name.max'=>'El campo del Nombre maximo son 255 caracteres',
        ];
    }
}
