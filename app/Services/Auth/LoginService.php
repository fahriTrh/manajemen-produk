<?php

namespace App\Services\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginService {
    public function start_authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return TRUE;
        }
    }
}