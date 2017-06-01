<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginValidation;
use App\Http\Controllers\Controller;
use Auth;
use Lang;

/**
 * Class AdminLoginController
 * This Class controls the Admin Login
 * @package App\Http\Controllers\Auth
 */
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Show login form for admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm(){
        return view('admin.login');
    }
    /**
     * Handle a login request to the application.
     *
     * @param  \App\Http\Requests\Admin\LoginValidation  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(LoginValidation $request)
    {
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email','remember'))
            ->withErrors([
            "errorlogin"=> Lang::get('auth.failed'),
        ]);
    }
}
