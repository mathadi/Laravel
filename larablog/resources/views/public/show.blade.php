<x-guest-layout>
    <div class="text-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $article->title }}
        </h2>
    </div>

     {{-- Affichage de la catégorie --}}
    <div class="text-gray-500 text-sm mb-2 text-center">
        Catégorie : {{ $article->categories->name ?? 'Aucune' }}
        {{-- Si plusieurs catégories : --}}
        {{-- Catégories : {{ $article->categories->pluck('name')->join(', ') ?: 'Aucune' }} --}}
    </div>

    <div class="text-gray-500 text-sm">
        Publié le {{ $article->created_at->format('d/m/Y') }} par <a
            href="{{ route('public.index', $article->user->id) }}">{{ $article->user->name }}</a>
    </div>

    <div>
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <p class="text-gray-700 dark:text-gray-300">{{ $article->content }}</p>
        </div>
    </div>

    <!-- Ajout d'un commentaire -->
    @auth
        <form action="{{ route('comments.store') }}" method="post" class="mt-6">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">

            <!-- Ajouter le reste de votre formulaire -->
            <div class="mt-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Votre commentaire</label>
                <textarea id="content" name="content" rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required></textarea>
            </div>
            <button type="submit"
                class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Ajouter un commentaire
            </button>
        </form>
    @endauth

    <!-- Affichage des commentaires -->
    @foreach ($article->comments as $comment)
        <div class="bg-gray-100 p-4 rounded-lg mt-4">
            <p class="text-gray-800">{{ $comment->content }}</p>
            <div class="text-gray-500 text-sm mt-2">
                Publié le {{ $comment->created_at->format('d/m/Y') }} par <a
                    href="{{ route('public.index', $comment->user->id) }}">{{ $comment->user->name }}</a>
            </div>
        </div>
    @endforeach
</x-guest-layout>