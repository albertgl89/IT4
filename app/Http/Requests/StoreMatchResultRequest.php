<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatchResultRequest extends FormRequest
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
            'goals_team1' => 'required|integer|gte:0',
            'goals_team2' => 'required|integer|gte:0',
        ];
    }

    /**
     * Attribute name for user readability.
     * @return array
     */
    public function attributes()
    {
        return [
            'goals_team1' => 'gols del primer equip',
            'goals_team1' => 'gols del segon equip',
        ];
    }

    /**
     * Error messages that will be displayed upon validation.
     * @return array
     */
    public function messages()
    {
        return [
            'goals_team1.required' => 'Els :attribute són obligatoris.',
            'goals_team2.required' => 'Els :attribute són obligatoris.',
            'goals_team1.integer' => 'Els :attribute han de ser un enter.',
            'goals_team2.integer' => 'Els :attribute han de ser un enter.',
            'goals_team1.gte' => 'Els :attribute han de ser 0 o més.',
            'goals_team2.gte' => 'Els :attribute han de ser 0 o més.',
            ];
    }
}
