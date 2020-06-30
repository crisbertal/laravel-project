<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // permite que todas las personas que puedan crear un ToDo usen estas reglas
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
            'title' => 'required|max:255',
        ];
    }

    /**
     * Devuelve los mensajes por cada error descrito
     * 
     * @return array
     */
    public function messages() {
        return [
            'title.max' => 'Todo title should not be greater than 255 chars.',
        ];
    }
}
