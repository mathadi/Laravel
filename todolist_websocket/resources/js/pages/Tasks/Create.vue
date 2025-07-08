<template>
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Créer une tâche</h1>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block mb-1">Titre</label>
                <input v-model="form.title" type="text" class="w-full border rounded px-3 py-2" />
            </div>

            <div class="mb-4">
                <label class="block mb-1">Description</label>
                <textarea v-model="form.description" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Date limite</label>
                <input v-model="form.due_date" type="date" class="w-full border rounded px-3 py-2" />
            </div>

            <div class="mb-4">
                <label class="block mb-1">Statut</label>
                <select v-model="form.status" class="w-full border rounded px-3 py-2">
                    <option value="todo">À faire</option>
                    <option value="in_progress">En cours</option>
                    <option value="completed">Terminée</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Créer</button>
        </form>
    </div>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3'

const form = useForm({
    title: '',
    description: '',
    due_date: '',
    status: 'todo'
})

function submit() {
    form.post('/tasks')
}
</script>
