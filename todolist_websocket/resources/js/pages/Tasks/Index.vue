<script setup>
import { Link, router } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'
const props = defineProps({ tasks: Object })
const tasks = ref(props.tasks)

function supprimer(id) {
    if (confirm("Supprimer cette tâche ?")) {
        router.delete(`/tasks/${id}`)
    }
}

onMounted(() => {
    // console.log('Echo :', window.Echo.channel);

    Echo.channel('created_tasks')
        .listen('CreatedTaskEvent', (event) => {
            console.log('Task created:', event);
            tasks.value.push(event.task);
            /* reactiveTasks.value.sort((a, b) => new Date(a.due_date) - new Date(b.due_date)); */
        });

    Echo.channel('deleted_tasks')
        .listen('DeletedTaskEvent', (event) => {
            console.log('Task deleted:', event.task);
            tasks.value = tasks.value.filter(task => task.id !== event.task.id);
            console.log('Updated tasks after deletion:', tasks.value);
        });

    Echo.channel('updated_tasks')
        .listen('UpdatedTaskEvent', (event) => {
            console.log('Task updated:', event);
            tasks.value = tasks.value.map(task => {
                if (task.id === event.task.id) {
                    return { ...task, ...event.task };
                }
                return task;
            });
            console.log('Updated tasks after update:', tasks.value);
        });



});

/* const reactiveTasks = ref([...props.tasks]); */
</script>


<template>
    <div class="w-2xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-extrabold text-gray-800">Toutes les tâches</h1>
            <Link href="/tasks/create"
                class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 transition text-white px-4 py-2 rounded shadow">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter
            </Link>
        </div>

        <div v-if="tasks.length === 0" class="text-center text-gray-500 py-12">
            <svg class="mx-auto w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                <circle cx="12" cy="12" r="10" />
            </svg>
            <p class="text-lg">Aucune tâche trouvée.</p>
        </div>

        <div v-else class="space-y-4">
            <div v-for="task in tasks" :key="task.id"
                class="bg-white border border-gray-200 p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="flex flex-col gap-5">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ task.title }}</h2>
                        <p class="text-gray-600 mt-1">{{ task.description }}</p>
                        <div class="flex items-center gap-4 mt-2 text-sm">
                            <span class="flex items-center gap-1 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ task.due_date || 'Non définie' }}
                            </span>
                            <span class="flex items-center gap-1 text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                                </svg>
                                Statut : <span
                                    :class="task.status === 'complétée' ? 'text-green-600 font-bold' : 'text-yellow-600 font-bold'">{{
                                    task.status }}</span>
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <Link :href="`/tasks/${task.id}`" class="text-blue-600 hover:underline">Voir</Link>
                        <Link :href="`/tasks/${task.id}/edit`" class="text-yellow-500 hover:underline">Modifier</Link>
                        <button @click="supprimer(task.id)" class="text-red-600 hover:underline">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
