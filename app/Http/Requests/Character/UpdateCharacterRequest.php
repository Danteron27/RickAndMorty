<?php

namespace App\Http\Requests\Character;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', Rule::unique('characters')->ignore($this->route('character'))],
            'location_id' => ['required', 'numeric'],
            'origin_id' => ['nullable','numeric'],
            'status' => ['required', 'string', Rule::in(['Alive', 'Dead', 'unknown'])],
            'species' => ['required', 'string', Rule::in([ 'Alien' , 'Animal' , 'Cronenberg', 'Disease', 'Human', 'Humanoid', 'Mythological Creature', 'Planet', 'Robot', 'unknown', 'Poopybutthole' ])],
            'type' => ['nullable', 'string'],
            'gender' => ['required', 'string', Rule::in([ 'Male' , 'Female' ,'Genderless', 'unknown'])],
            'image' => ['string'],
            'url' => ['nullable'],
        ];    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.unique' => 'El nombre ya está en uso.',
            
            'location_id.required' => 'La ubicación es requerido.',
            'location_id.numeric' => 'La ubicación debe ser numérico.',

            'origin_id.numeric' => 'El origen debe ser numérico.',

            'status.required' => 'El estado es requerido.',
            'status.in' => 'El estado seleccionado es inválido.',

            'species.required' => 'La especie es requerida.',
            'species.in' => 'La especie seleccionada es inválida.',


         
            'gender.required' => 'El género es requerido.',
            'gender.in' => 'El género seleccionado es inválido.',

            'image.required' => 'La imagen es requerida.',

        ];
    }
}
