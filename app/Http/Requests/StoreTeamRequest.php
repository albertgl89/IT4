<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'short_name' => 'required|string|max:10|regex:/[A-Z]+/',
            'city' => 'required',
        ];
    }

    /**
     * Attribute name for user readability.
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nom complet de l\'equip',
            'short_name' => 'nom abreviat',
            'city' => 'localització',
        ];
    }

    /**
     * Error messages that will be displayed upon validation.
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El :attribute és obligatori.',
            'short_name.required' => 'El :attribute és obligatori.',
            'short_name.regex' => 'El :attribute ha de ser una combinació de lletres en majúscules.',
            'city.required' => 'El :attribute és obligatori.',
            'name.max' => 'El :attribute no pot excedir els 100 caràcters.',
            'short_name.max' => 'El :attribute no pot excedir els 10 caràcters.',
        ];
    }
}
