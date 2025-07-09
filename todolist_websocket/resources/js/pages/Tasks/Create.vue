<template>
    <div class="max-w-xl mx-auto p-8 bg-white rounded-xl shadow-lg mt-8">
        <h1 class="text-3xl font-extrabold mb-8 text-gray-800 flex items-center gap-2">
            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Créer une tâche
        </h1>
        <form @submit.prevent="submit" class="space-y-6">
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Titre</label>
                <input v-model="form.title" type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" placeholder="Titre de la tâche" />
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Description</label>
                <textarea v-model="form.description" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" rows="3" placeholder="Description"></textarea>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Date limite</label>
                <input v-model="form.due_date" type="date" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Statut</label>
                <select v-model="form.status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    <option value="todo">À faire</option>
                    <option value="in_progress">En cours</option>
                    <option value="completed">Terminée</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-bold py-3 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-400 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Créer
            </button>
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
