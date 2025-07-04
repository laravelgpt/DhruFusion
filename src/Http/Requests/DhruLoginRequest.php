<?php

namespace laravelgpt\DhruFusion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DhruLoginRequest extends FormRequest
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
            'username' => 'required',
            'key'    => 'required'
        ];
    }
}
