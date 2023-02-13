<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required|string|min:100',
            'github_link' => 'required|url|regex:/github/',
            'cover_img' => 'required|image',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id|array'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obbligatorio',
            'name.max' => 'Il titolo deve avere massimo 255 caratteri',
            'description.required' => 'Campo obbligatorio',
            'description.min' => 'Dài, un po\' d\'impegno...',
            'github_link.required' => 'Campo obbligatorio',
            'github_link.url' => 'Inserisci un link >.<',
            'github_link.regex' => 'Inserisci un link github!',
            'cover_img.image' => 'Carica un\'immagine',
            'technologies.exists' => 'Campo non valido'
        ];
    }
}
