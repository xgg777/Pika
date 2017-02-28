<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    //
    public function rules()
    {
        return [
            //
            'name' => 'required|max:255|min:2',
            'label' => 'required',
            'description' => 'required',
        ];
    }
}
