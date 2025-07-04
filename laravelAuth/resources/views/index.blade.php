@extends('layouts.app')

@section('title', 'Liste des utilisateurs')

@section('content')
    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg mt-8">
        @include('message')
        
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <thead class="text-xs uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-6 py-3">Nom</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Rôle</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="transition hover:bg-blue-50 dark:hover:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            @if($user->role == 1)
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded-full">Admin</span>
                            @else
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold text-white bg-green-600 rounded-full">User</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('user.edit', $user->id) }}"
                                class="inline-block px-2 py-1 text-xs font-medium text-indigo-600 hover:text-indigo-900 transition" title="Éditer">
                                <!-- Icône stylo (éditer) -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16.862 3.487a2.25 2.25 0 113.182 3.182l-11.25 11.25a2 2 0 01-.878.513l-4 1a1 1 0 01-1.213-1.213l1-4a2 2 0 01.513-.878l11.25-11.25z" />
                                </svg>
                            </a>
                            <a href="{{ route('user.delete', $user->id) }}"
                                class="inline-block px-2 py-1 text-xs font-medium text-red-600 hover:text-red-900 transition" title="Supprimer">
                                <!-- Icône poubelle (supprimer) -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m5 0H4" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">Aucun utilisateur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection