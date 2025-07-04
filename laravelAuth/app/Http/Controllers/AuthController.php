<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }
    public function registerView()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|int',
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('users.index')->with('success', 'You\'re now connected !');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect()->route('users.index');
        }

        throw ValidationException::withMessages(['credentials'=>'Les identifiants sont incorrects']);

        // return redirect()->route('login.view')->with('error', 'Invalid credentials.');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.view')->with('success', 'Logged out successfully.');
    }
    public function index()
    {
        $users = User::all();
        return view('index', compact('users'));
    }
}
