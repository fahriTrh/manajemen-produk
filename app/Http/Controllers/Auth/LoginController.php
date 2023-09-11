<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\LoginService;

class LoginController extends Controller
{
    private $authenticate;

    public function index()
    {
        return view('auth.login', ['title' => 'login']);
    }

    public function store(Request $request)
    {
        $this->authenticate = new LoginService;

        if ($this->authenticate->start_authenticate($request)) {
            return redirect()->intended('/dashboard');
        }

        return back()->with('failed', 'email atau password invalid!');
    }
}
