<template>
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ task.title }}</h1>
        <p class="mb-2 text-gray-700">{{ task.description }}</p>
        <p class="text-sm text-gray-500">Date limite : {{ task.due_date ?? 'Non précisée' }}</p>
        <p class="text-sm text-gray-500">Statut : <span class="uppercase">{{ task.status }}</span></p>

        <div class="mt-6">
            <Link :href="`/tasks/${task.id}/edit`" class="text-yellow-500 mr-4">Modifier</Link>
            <Link href="/tasks" class="text-blue-500">← Retour à la liste</Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({ task: Object })
</script>
