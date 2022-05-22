<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
