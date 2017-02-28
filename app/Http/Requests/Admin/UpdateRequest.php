<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UpdateRequest extends Request
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
    //
    public function rules()
    {
        return [
            'username' => 'required|max:255|min:2',
            'email' => 'required|email',
            'password' => 'min:6',
        ];
    }
}
