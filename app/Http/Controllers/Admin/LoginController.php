<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends BaseController
{

    public function index()
    {
        return view('admin.login');
    }
}
