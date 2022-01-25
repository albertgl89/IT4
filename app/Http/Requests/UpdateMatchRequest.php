<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMatchRequest extends FormRequest
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
            'match_date' => 'required|date',
            'location_id' => 'required',
            'team1' => 'required|different:team2',
            'team2'=> 'required',
        ];
    }

    /**
     * Attribute name for user readability.
     * @return array
     */
    public function attributes()
    {
        return [
            'match_date' => 'data i hora del partit',
            'team1' => '1r equip',
            'team2' => '2n equip',
            'location_id' => 'localització del partit',
        ];
    }

    /**
     * Error messages that will be displayed upon validation.
     * @return array
     */
    public function messages()
    {
        return [
            'match_date.required' => 'La :attribute són obligatoris.',
            'match_date.date' => 'La :attribute ha de ser una data i hora correcta.',
            'team1.required' => 'El :attribute és obligatori.',
            'team2.required' => 'El :attribute és obligatori.',
            'team1.different' => 'Un equip no pot jugar contra ell mateix.',
            'location_id.required' => 'La :attribute és obligatòria.',
            ];
    }
}
