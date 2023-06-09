<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'dni' => 'required|string|regex:/^\d{8}[a-zA-Z]$/',
            'email' => 'required|email',
            'phone' => 'required|string|regex:/^\d{9}$/',
            'servicios' => 'required',
            'model' => 'required|string|max:255',
            'plate' => 'required|string|regex:/^\d{4}[a-zA-Z]{3}$/',
            'limitDate' => 'required|date|after:today',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'El nombre del cliente es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.regex' => 'El DNI tiene no es válido.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser válido.',
            'phone.required' => 'El teléfono del cliente es obligatorio.',
            'phone.regex' => 'El teléfono debe tener 9 números.',
            'servicios.required' => 'Debe seleccionar al menos un servicio.',
            'model.required' => 'El modelo del coche es obligatorio.',
            'plate.required' => 'La matrícula del coche es obligatoria.',
            'plate.regex' => 'La matrícula del coche no es válida.',
            'limitDate.required' => 'La fecha de recogida es obligatoria.',
            'limitDate.after' => 'La fecha debe ser actual o posterior a hoy',
        ];
    }

}
