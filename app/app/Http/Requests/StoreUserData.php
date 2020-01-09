<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CorrectFields;

class StoreUserData extends FormRequest
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
            'profession' => 'required|string|max:100',
            'places' => ['required', new CorrectFields],
            'places.*.name' => 'required|string|max:100',
            'places.*.date_from' => 'required|date',
            'places.*.date_to' => 'required|date',
            'places.*.description' => 'required|string'
        ];
    }
}
