<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import Index from './Tasks/Index.vue';

type TasksProps = {
    tasks: Array<{
        id: number;
        title: string;
        description: string;
        due_date: string | null;
        status: 'todo' | 'in_progress' | 'completed';
    }>;
};
const props = defineProps<{ tasks:['tasks'] }>()

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <Index :tasks="props.tasks" />
        </div>
    </AppLayout>
</template>
