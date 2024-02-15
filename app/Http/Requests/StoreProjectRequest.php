<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'img_project' => 'nullable|image',
            'title' => 'required|unique:projects|max:50',
            'stack' => 'required|max:60',
            'description' => 'max:500',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id'
        ];
    }

    public function messages()
    {
        return [
            'img_project.image' => 'Il file deve essere un\'immagine',
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.unique' => 'Il campo titolo deve essere univoco',
            'title.max' => 'Il campo titolo deve essere minore di 50 caratteri',
            'stack.required' => 'Il campo stack è obbligatorio',
            'stack.max' => 'Il campo stack deve essere minore di 60 caratteri',
            'description.max' => 'Il campo stack deve essere minore di 500 caratteri',
            'type_id.exists' => 'La selezione non è valida',
            'technologies.exists' => 'La selezione non è valida',
        ];
    }
}
