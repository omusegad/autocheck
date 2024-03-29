<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeyActionRequest extends FormRequest
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
            'country_id'  => 'int|required',
            'pillars_id'  => 'int|required',
            'key_action_id'  => 'int|required',
            'matrixType'  => 'string|required',
            'status'  => 'string|required',
            'priority'  => 'string|required',
        ];
    }
}
