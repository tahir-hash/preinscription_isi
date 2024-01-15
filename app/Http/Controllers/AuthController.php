<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //view login
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    // Traitement
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user); 
                return redirect()->route('dashboard'); 
            } else {
                return redirect()->route('login')->with('danger', 'Le mot de passe ne correspond pas !');
            }
        } else {
        return redirect()->route('login')->with('danger', 'L\'utilisateur n\'existe pas !');
        
        }
    }

    //view register
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
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
        $role_id = Role::where('name', 'ETUDIANT')->firstOrFail()->id;
        $user= User::create($request->all());
        $user->roles()->sync($role_id);

        // Redirection vers une autre page après l'inscription
        return redirect()->route('login')->with('success', 'Inscription réussie !');
    }


    //logout

    public function logout (Request $request){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
