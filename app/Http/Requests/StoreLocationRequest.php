<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
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
            'city' => 'required|string|max:40',
            'state' => 'required|string|max:40',
            'stadium_name' => 'required|string|max:150|unique:locations,stadium_name',
        ];
    }

     /**
     * Attribute name for user readability.
     * @return array
     */
    public function attributes()
    {
        return [
            'city' => 'ciutat',
            'state' => 'país',
            'stadium_name' => 'nom de l\'estadi',
        ];
    }

    /**
     * Error messages that will be displayed upon validation.
     * @return array
     */
    public function messages()
    {
        return [
            'city.required' => 'La :attribute és obligatòria.',
            'state.required' => 'El :attribute és obligatori.',
            'stadium_name.required' => 'El :attribute és obligatori.',
            'city.max' => 'La :attribute no pot excedir els 40 caràcters.',
            'state.max' => 'El :attribute no pot excedir els 40 caràcters.',
            'stadium_name.max' => 'El :attribute no pot excedir els 150 caràcters.',
            'stadium_name.unique' => 'El :attribute ja existeix a la base de dades.',
        ];
    }
}
