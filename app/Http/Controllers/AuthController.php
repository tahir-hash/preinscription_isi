<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    //traitement

    public function register(Request $request)
    {
        // Validation des données reçues du formulaire
        $validator = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'telephone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'date_naissance' => 'required|date',
        ]);

        $request['password'] = Hash::make($request->password);
        User::create($request->all());

        // Redirection vers une autre page après l'inscription
        return redirect()->route('login')->with('success', 'Inscription réussie !');
    }
}
