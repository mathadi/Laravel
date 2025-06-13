
@extends('articles.create');
<!-- @vite('resources/css/app.css') -->
@section('formulaire')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Titre</label>
            <input type="text" name="title" id="title"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="mb-4">
            <label for="body" class="block text-gray-700 font-semibold mb-2">Contenu</label>
            <textarea name="body" id="body" rows="5"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required></textarea>
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-gray-700 font-semibold mb-2">Auteur (ID utilisateur)</label>
            <input type="number" name="user_id" id="user_id"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="mb-6">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image (facultative)</label>
            <input type="file" name="image" id="image"
                class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                accept="image/*">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow">
                Ajouter l'article
            </button>
        </div>
@endsection