<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //view login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Traitement
    public function login(Request $request)
    {
        
    }

    //view register
    public function showRegisterForm()
    {
        return view('auth.register');
    }
}
