<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Message flash -->
@if (session('success'))
<div class="bg-green-500 text-white p-4 rounded-lg mt-6 mb-6 text-center mx-2">
    {{ session('success') }}
</div>
@endif
    <!-- Articles -->
    @foreach ($articles as $article)
        <div class="bg-white overflow-hidden shadow-sm rounded-lg mt-4 mx-2">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                <p class="text-gray-700">{{ (substr($article->content, 0, 35)) }}...</p>
            </div>
            <div class="text-right">
                <a href="{{ route('articles.edit', $article->id) }}" class="relative bottom-1 mr-3 text-red-500 hover:text-red-700">Modifier</a>
            </div>
        </div>
    @endforeach
</x-app-layout>