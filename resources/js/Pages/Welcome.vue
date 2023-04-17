<script setup>
import Layout from '@/Layouts/Layout.vue'
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import HeroSection from '@/Components/HeroSection.vue';

</script>

<template>
    <Head title="Welcome" />
    <Layout>
        <HeroSection/>
        <!-- <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Welcom</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div> -->
    </Layout>
</template>
