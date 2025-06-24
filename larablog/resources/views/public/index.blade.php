<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste des articles publiés de {{ $user->name }}
        </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 w-4xl mx-auto">
        @forelse ($articles as $article)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-3 flex flex-col h-full">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100 truncate w-3/4">{{ $article->title }}</h2>
                    <span class="text-xs text-right text-gray-400">Crée le
                        {{ $article->created_at->format('d/m/Y') }}</span>
                </div>
                <div>
                    @forelse($article->categories as $category)
                        <span
                            class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full mr-1 mb-1">
                            {{ $category->name }}
                        </span>
                    @empty
                        <span
                            class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full mr-1 mb-1">Aucune
                            catégorie</span>
                    @endforelse
                </div>
                <p class="text-gray-700 dark:text-gray-300 mb-4 flex-1">
                    {{ Str::limit($article->content, 80) }}
                </p>
                <img src="{{ $article->image }}" class="" alt="image de l'article"/>
                <a href="{{ route('public.show', [$article->user_id, $article->id]) }}"
                    class="mx-auto w-1/2 text-center inline-block bg-sky-500 hover:bg-sky-700 text-white font-semibold px-4 py-2 rounded transition">
                    Lire la suite
                </a>
            </div>
        @empty
            <div class="text-center text-gray-500 col-span-5">Aucun article publié.</div>
        @endforelse
    </div>
</x-guest-layout>