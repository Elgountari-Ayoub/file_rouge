<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <Layout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>
    </Layout>
</template>
