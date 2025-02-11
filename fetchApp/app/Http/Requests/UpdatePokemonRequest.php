<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePokemonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'tipo' => 'required|string|max:50',
            'nivel' => 'required|integer|min:1|max:100',
            'id_entrenador' => 'required|exists:trainers,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del Pokémon es obligatorio',
            'tipo.required' => 'El tipo de Pokémon es obligatorio',
            'nivel.required' => 'El nivel es obligatorio',
            'nivel.min' => 'El nivel mínimo es 1',
            'nivel.max' => 'El nivel máximo es 100',
            'id_entrenador.required' => 'Debe seleccionar un entrenador',
            'id_entrenador.exists' => 'El entrenador seleccionado no existe',
        ];
    }

    public function wantsJson()
    {
        return true;
    }
}
