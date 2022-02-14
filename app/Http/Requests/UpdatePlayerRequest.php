<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()->hasRole('admin')){
            return true;
        }
        return false;
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
            'surname' => 'required|string|max:100',
            'team_id' => 'required|integer',
        ];
    }

    /**
     * Attribute name for user readability.
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nom del jugador',
            'surname' => 'cognom del jugador',
            'team_id' => 'equip',
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
            'surname.required' => 'El :attribute és obligatori.',
            'team_id.required' => 'L\':attribute és obligatori.',
            'name.max' => 'El :attribute no pot excedir els 100 caràcters.',
            'surname.max' => 'El :attribute no pot excedir els 100 caràcters.',
            'team_id.integer' => 'L\':attribute ha de ser un número.',
        ];
    }
}
