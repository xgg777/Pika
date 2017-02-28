<?php

namespace App\Http\Requests\Comment;

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
            //'content' => 'required',
        ];
    }
}
