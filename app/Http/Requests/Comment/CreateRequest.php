<?php

namespace App\Http\Requests\Comment;

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

    //
    public function rules()
    {
        return [
            'email' => 'email',
            'nickname' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //'email.required' => '请填写邮箱',
            'email.email' => '请填写正确的邮箱地址',
            'nickname.required' => '请填写昵称',
            'content.required' => '请输入评论内容',
        ];
    }
}
