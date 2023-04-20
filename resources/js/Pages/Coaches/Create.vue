<script setup>
import Layout from '@/Layouts/Layout.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import CoachFormComp from '@/Components/CoachComps/CoachFormComp.vue';
import Footer from '@/Components/Footer.vue';

</script>

<template>
    <Head title="Coaches Create" />
    <Layout>
        <template #header>
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Coach Profile</h3>
                    <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you
                        share.</p>
                </div>
            </div>
        </template>
        <CoachFormComp />
        <Footer/>
    </Layout>
</template>
