<?php

namespace App\Http\Requests\Permission;

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
            'name' => 'required|unique:permissions|max:255|min:2',
            'label' => 'required|unique:permissions',
            'description' => 'required|unique:permissions',
        ];
    }
}
