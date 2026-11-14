<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determinar si el usuario está autorizado.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación.
     */
    public function rules(): array
    {
        return [
            'nombres' => 'required|string|max:80',

            'apellidos' => 'required|string|max:80',

            'id_empresa' => 'required|integer|exists:companies,id_empresa',

            'id_operador' => 'required|integer|exists:operators,id_operador',

            'id_grupo' => 'required|integer|exists:groups,id_grupo',

            'telefono_movil' => 'required|string|digits_between:9,11',

            'telefono_casa' => 'nullable|string|digits_between:7,11',

            'correo' => 'nullable|email|max:90',

            'descripcion_grupo' => 'nullable|string|max:80',

            'fecha_cumpleanios' => 'nullable|date',

            'observaciones' => 'nullable|string|max:100',
        ];
    }

    /**
     * Mensajes personalizados.
     */
    public function messages(): array
    {
        return [
            'nombres.required' => 'Los nombres son obligatorios.',
            'nombres.max' => 'Los nombres no deben superar los 80 caracteres.',

            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.max' => 'Los apellidos no deben superar los 80 caracteres.',

            'id_empresa.required' => 'Debes seleccionar una empresa.',
            'id_empresa.exists' => 'La empresa seleccionada no existe.',

            'id_operador.required' => 'Debes seleccionar un operador.',
            'id_operador.exists' => 'El operador seleccionado no existe.',

            'id_grupo.required' => 'Debes seleccionar un grupo.',
            'id_grupo.exists' => 'El grupo seleccionado no existe.',

            'telefono_movil.required' => 'El teléfono móvil es obligatorio.',
            'telefono_movil.digits_between' => 'El teléfono móvil debe tener entre 9 y 11 dígitos.',

            'telefono_casa.digits_between' => 'El teléfono de casa debe tener entre 7 y 11 dígitos.',

            'correo.email' => 'Ingresa un correo electrónico válido.',
            'correo.max' => 'El correo no debe superar los 90 caracteres.',

            'descripcion_grupo.max' => 'La descripción no debe superar los 80 caracteres.',

            'fecha_cumpleanios.date' => 'Ingresa una fecha de cumpleaños válida.',

            'observaciones.max' => 'Las observaciones no deben superar los 100 caracteres.',
        ];
    }
}
