<!-- filepath: c:\Users\Mathieu.Adimi\Documents\Laravel_github\larablog\resources\views\auth\register.blade.php -->
@extends('layouts.appauth')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md bg-white rounded-lg shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Inscription</h2>
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-gray-700 font-medium mb-1">Nom</label>
                <input 
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
                >
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium mb-1">Adresse email</label>
                <input 
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
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

            <div>
                <label for="password-confirm" class="block text-gray-700 font-medium mb-1">Confirmer le mot de passe</label>
                <input 
                    type="password"
                    id="password-confirm"
                    name="password_confirmation"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
                >
            </div>

            <button type="submit" class="w-full bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 rounded transition duration-200">
                S'inscrire
            </button>
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:underline">Déjà inscrit ? Connectez-vous</a>
            </div>
        </form>
    </div>
</div>
@endsection