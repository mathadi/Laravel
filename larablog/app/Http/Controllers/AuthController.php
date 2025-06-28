<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // Logique pour enregistrer un nouvel utilisateur
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('auth.login')->with('success', 'Inscription réussie !');
    }
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérification des identifiants
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Sécurité contre les attaques de session fixation
            return redirect()->intended('/dashboard')->with('success', 'Connexion réussie.');
        }
        // Si la connexion échoue
        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Invalide la session actuelle
        $request->session()->regenerateToken(); // Renouvelle le token CSRF

        return redirect('/login')->with('success', 'Déconnexion réussie.');
    }
}
