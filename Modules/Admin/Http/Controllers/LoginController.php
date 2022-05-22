<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\LoginRequest;


class LoginController extends Controller
{


    public function auth()
    {
        if(Auth::guest()) {
            return view('admin::user.login');
        }else{
            return redirect()->to("admin/users");
        }
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function login(LoginRequest $request)
    {

        if(!Auth::validate($request->validated())):
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['Неправильно введена Електронна пошта чи Пароль.'],
                'password' => ['Неправильно введена Електронна пошта чи Пароль.'],
            ]);
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($request->validated());

        Auth::login($user);

        return $this->authenticated($request, $user);
    }


    protected function authenticated(LoginRequest $request, $user)
    {
        return redirect()->to("admin/users");
    }
}
