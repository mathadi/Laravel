<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <!-- Message flash -->
    @if (session('success'))
        {{-- <div class="bg-green-500 text-white p-4 rounded-lg mt-6 mb-6 text-center mx-2">
            {{ session('success') }}
        </div> --}}
        {{-- <div> --}}
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top',
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    // text: {{ session('success') }},
                    timer: 3000,
                    timerProgressBar: true
                });
            </script>
            {{--
        </div> --}}
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mt-6 mb-6 text-center mx-2">
            {{ session('error') }}
        </div>
    @endif
    <!-- Articles -->
    @foreach ($articles as $article)
        <div class="bg-white overflow-hidden shadow-sm rounded-lg mt-4 mx-auto w-[60em] pl-6 flex justify-between h-[15em]">
            <div class="w-[70%] pt-5">
                <div class="pb-6 text-gray-900">
                    <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                    <p class="text-gray-700">{{ substr($article->content, 0, 35) }}...</p>
                </div>

                {{-- Affichage de la catégorie --}}
                @forelse ($article->categories as $category)
                    <span
                        class="inline-block bg-amber-100 text-amber-800 text-xs font-semibold px-3 py-1 rounded-full mr-1 mb-2">
                        {{ $category->name }}
                    </span>
                @empty
                    <span
                        class="inline-block bg-amber-100 text-amber-800 text-xs font-semibold px-3 py-1 rounded-full mr-1 mb-2">Aucune
                        catégorie</span>
                @endforelse

                <div class="relative top-5">
                    <a href="{{ route('articles.edit', $article->id) }}"
                        class="relative bottom-1 mr-3 bg-blue-500 hover:bg-blue-700 rounded-lg p-2 text-white">Modifier</a>
                    <a href="{{ route('articles.remove', $article->id) }}"
                        class="relative bottom-1 mr-3 bg-red-500 hover:bg-red-700 rounded-lg p-2 text-white">Supprimer</a>
                </div>
            </div>
            <div class="border w-[30%]">
                <figure>
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="image de l'article"
                            class="w-full h-full object-cover rounded-lg" />
                    @endif
                </figure>
            </div>
        </div>
    @endforeach
</x-app-layout>