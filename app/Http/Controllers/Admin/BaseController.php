<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
class BaseController extends Controller
{
    //use CurlRequest;
    //use CurlDsp;

    protected $_user = '';
    public function __construct()
    {
        //$this->middleware('auth');

       $this->_user = Auth::user();
    }
}