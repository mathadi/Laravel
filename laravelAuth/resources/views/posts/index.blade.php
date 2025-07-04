@extends('layouts.app')

@section('title', 'Liste des posts')

@section('content')
<div class="relative overflow-x-auto shadow-lg sm:rounded-lg mt-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Liste des posts</h2>
    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
        <thead class="text-xs uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-300">
            <tr>
                <th class="px-6 py-3">Titre</th>
                <th class="px-6 py-3">Auteur</th>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr class="transition hover:bg-blue-50 dark:hover:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ $post->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->user->name ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:text-blue-900" title="Voir">
                            <!-- Icône œil -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 5-7 9-7 9s-7-4-7-9a7 7 0 0114 0z" />
                            </svg>
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-indigo-600 hover:text-indigo-900 ml-2" title="Éditer">
                            <!-- Icône crayon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L5 11.828a2 2 0 010-2.828L11.586 2.414a2 2 0 012.828 0z" />
                            </svg>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2" title="Supprimer" onclick="return confirm('Supprimer ce post ?')">
                                <!-- Icône poubelle -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m5 0H4" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500">Aucun post trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection