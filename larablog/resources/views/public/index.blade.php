<x-guest-layout>
    <div class="text-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste des articles publiés de {{ $user->name }}
        </h2>
    </div>

    <div>
        <!-- Articles -->
        @foreach ($articles as $article)
            <div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                    
                    {{-- Affichage de la catégorie --}}
                    <p class="text-sm text-gray-500 mb-2">
                        {{-- Catégorie : {{ $article->categories->name ?? 'Aucune' }}  --}}
                        {{-- Si un article peut avoir plusieurs catégories --}}
                        Catégories : {{ $article->categories->pluck('name')->join(', ') ?: 'Aucune' }}
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">{{ substr($article->content, 0, 30) }}...</p>

                    <a href="{{ route('public.show', [$article->user_id, $article->id]) }}"
                        class="text-red-500 hover:text-red-700">Lire la suite</a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</x-guest-layout>