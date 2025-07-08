<template>
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Modifier la tâche</h1>
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

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Mettre à jour</button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
const props = defineProps( ['task'])

const form = useForm({
    title: props.task.title,
    description: props.task.description,
    due_date: props.task.due_date,
    status: props.task.status,
})

function submit() {
    form.put(`/tasks/${props.task.id}`)
}
</script>