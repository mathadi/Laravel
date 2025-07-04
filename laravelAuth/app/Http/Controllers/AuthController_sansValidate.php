<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        //au lieu de faire un validate, on peut faire un try catch
        try {
            $user = new User();
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();
            // Redirect to the login page with a success message
            return redirect()->route('login.view')->with('success', 'Registration successful! Please log in.');
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->route('register.view')->with('error', $e->getMessage());
        }
    }
    public function login(Request $request)
    {
        //au lieu de faire un validate, on peut faire un try catch
        try {
            $credentials = $request->only('email', 'password');
            if (auth()->attempt($credentials)) {
                // Authentication passed...
                return redirect()->route('users.index')->with('success', 'Login successful!');
            } else {
                return redirect()->route('login.view')->with('error', 'Invalid credentials.');
            }
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->route('login.view')->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('users.index', compact('users'));
    }

    public function edit()
    {

    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();
            // Redirect to the login page with a success message
            return redirect()->route('login.view')->with('success', 'Registration successful! Please log in.');
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->route('login.view')->with('error', $e->getMessage());
        }
    }

    public function delete(User $user)
    {
        try {
            $user = User::find($user->id);
            if (!empty($user)) {
                $user->delete();
                $user->save();
            }
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
    }
}
