<script setup>
import Layout from '@/Layouts/Layout.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import CoachFormComp from '@/Components/CoachComps/CoachFormComp.vue';
import CoachCard from '@/Components/CoachComps/CoachCard.vue';
import Footer from '@/Components/Footer.vue';


const props = defineProps(['coach']);

</script>

<template>
    <Head title="Coaches Create" />
    <Layout>
        <template #header>
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Coach Profile</h3>
                </div>
            </div>
        </template>
        <CoachCard :coach="coach"/>
        <Footer/>
        <!-- <CoachFormComp /> -->
        <!-- <div class="bg-gray-100">
            <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="px-4 py-6 sm:px-0">
                    <div class="max-w-4xl mx-auto">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                            <div class="md:col-span-2">
                                <img :src="coach.photo" :alt="coach.name" class="w-full h-auto rounded-lg">
                            </div>
                            <div class="md:col-span-1">
                                <h1 class="mb-4 text-3xl font-bold">{{ coach.name }}</h1>
                                <p class="mb-4 text-gray-600">{{ coach.specialization }}</p>
                                <p class="mb-4 text-gray-800">{{ coach.story }}</p>
                                <h2 class="mb-2 text-xl font-bold">Experience:</h2>
                                <p class="mb-4 text-gray-600">{{ coach.experience }}</p>
                                <h2 class="mb-2 text-xl font-bold">Contact:</h2>
                                <p class="mb-4 text-gray-600">{{ coach.email }}</p>
                                <p class="mb-4 text-gray-600">{{ coach.phone }}</p>
                                <p class="mb-4 text-gray-600">{{ coach.country }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </Layout>
</template>
