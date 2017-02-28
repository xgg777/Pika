<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   // use CurlRequest;

    /**
     * 视图：登录
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * 动作：执行登录
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            return responseSuccess('', '', route('admin.index'));
        }
        return responseWrong('邮箱或密码错误');
    }

    /**
     * 动作：退出
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLoginOut()
    {
        Auth::logout();
        return redirect()->guest('auth/login');
    }
}