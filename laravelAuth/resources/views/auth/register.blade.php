@extends('layouts.app')

@section('title', 'Créer un utilisateur')

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-8 mt-6">Register for an account</h1>

        <form class="max-w-sm mx-auto" method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            <div class="flex mb-4">
                <input type="text" id="name"
                    class="rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nom" name="name" value="{{ old('name') }}" required>
            </div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <div class="flex mb-4">
                <input type="email" id="email"
                    class="rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Email" name="email" value="{{ old('email') }}" required>
            </div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
            <div class="flex mb-6">
                <input type="password" id="password"
                class="rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Mot de passe" name="password" required>
            </div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmation du mot de passe</label>
            <div class="flex mb-6">
                <input type="password" id="password_confirmation"
                class="rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Confirmation du mot de passe" name="password_confirmation" required>
            </div>
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rôle</label>
            <div class="flex mb-4">
                <select id="role" name="role"
                    class="rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option value="">Sélectionner un rôle</option>
                    <option value="1">Administrateur</option>
                    <option value="0">Utilisateur</option>
                </select>
            </div>
            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Créer un utilisateur
            </button>
        </form>

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="mt-6 max-w-sm mx-auto">
                <div class="flex items-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg" role="alert">
                    <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12A9 9 0 1 1 3 12a9 9 0 0 1 18 0z"/>
                    </svg>
                    <div>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @include('message')
    </div>

@endsection