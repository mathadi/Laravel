<!-- filepath: c:\Users\Mathieu.Adimi\Documents\Laravel_github\larablog\resources\views\auth\login.blade.php -->
@extends('layouts.appauth')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md bg-white rounded-lg shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Connexion</h2>
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-gray-700 font-medium mb-1">Adresse email</label>
                <input 
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-medium mb-1">Mot de passe</label>
                <input 
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="w-full px-4 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input 
                    type="checkbox"
                    id="remember"
                    name="remember"
                    class="h-4 w-4 text-gray-600 border-gray-300 rounded focus:ring-2 focus:ring-gray-300"
                    {{ old('remember') ? 'checked' : '' }}
                >
                <label class="ml-2 block text-gray-600 text-sm" for="remember">Se souvenir de moi</label>
            </div>

            <button type="submit" class="w-full bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 rounded transition duration-200">
                Se connecter
            </button>
            <div class="text-center mt-4">
                <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:underline">Pas encore de compte ? S'inscrire</a>
            </div>
            <div class="mt-6 text-center text-gray-600 text-sm">
                <a class="text-blue-600 hover:underline" href="{{ route('socialite.redirect') }}" title="Connexion/Inscription avec Google">Continuer avec Google</a><br>
                {{-- <a class="text-blue-600 hover:underline" href="{{ route('socialite.redirect', 'github') }}" title="Connexion/Inscription avec GitHub">Continuer avec GitHub</a><br>
                <a class="text-blue-600 hover:underline" href="{{ route('socialite.redirect', 'facebook') }}" title="Connexion/Inscription avec Facebook">Continuer avec Facebook</a><br>
                <a class="text-blue-600 hover:underline" href="{{ route('socialite.redirect', 'twitter') }}" title="Connexion/Inscription avec Twitter">Continuer avec Twitter</a> --}}
            </div>
        </form>
    </div>
</div>
@endsection