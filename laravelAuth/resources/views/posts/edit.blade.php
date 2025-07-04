@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white dark:bg-gray-800 p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Modifier le post</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 dark:text-gray-200 mb-2">Titre</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-white" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 dark:text-gray-200 mb-2">Contenu</label>
            <textarea name="content" id="content" rows="5" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-white" required>{{ old('content') }}</textarea>
            @error('content')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition">Publier</button>
    </form>
</div>