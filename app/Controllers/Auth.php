<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('user/login');
    }
}
