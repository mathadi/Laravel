<template>
    <div class="p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Toutes les tâches</h1>

        <Link href="/tasks/create" class="bg-blue-600 text-white px-4 py-2 rounded mb-6 inline-block">
        + Ajouter une tâche
        </Link>

        <div v-if="tasks.length === 0">Aucune tâche trouvée.</div>

        <div v-else>
            <div v-for="task in tasks" :key="task.id" class="bg-white border p-4 rounded mb-4 shadow">
                <h2 class="text-xl font-semibold">{{ task.title }}</h2>
                <p class="text-gray-600">{{ task.description }}</p>
                <p class="text-sm text-gray-400">Date limite : {{ task.due_date || 'Non définie' }}</p>
                <p class="text-sm text-gray-500">Statut : {{ task.status }}</p>

                <div class="mt-2 flex gap-4">
                    <Link :href="`/tasks/${task.id}`" class="text-blue-600">Voir</Link>
                    <Link :href="`/tasks/${task.id}/edit`" class="text-yellow-500">Modifier</Link>
                    <button @click="supprimer(task.id)" class="text-red-600">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
defineProps({ tasks: Array })

function supprimer(id) {
    if (confirm("Supprimer cette tâche ?")) {
        router.delete(`/tasks/${id}`)
    }
}
</script>
