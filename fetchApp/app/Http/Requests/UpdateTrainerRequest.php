<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainerRequest extends FormRequest
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
            'region' => 'required|string|max:50',
            'edad' => 'required|integer|min:10|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del entrenador es obligatorio',
            'region.required' => 'La región es obligatoria',
            'edad.required' => 'La edad es obligatoria',
            'edad.min' => 'La edad mínima es 10 años',
            'edad.max' => 'La edad máxima es 100 años',
        ];
    }

    public function wantsJson()
    {
        return true;
    }
}
