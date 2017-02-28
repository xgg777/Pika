<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CreateRequest extends Request
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
            //
            'username' => 'required|unique:users|max:255|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];
    }
}
