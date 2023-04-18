<script setup>
import Layout from '@/Layouts/Layout.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import ClientProfile from '@/Components/ClientComps/ClientProfile.vue';
import ClientSideBar from '@/Components/ClientComps/ClientSideBar.vue';

const props = defineProps(['client']);
</script>   


<template>
    <Head title="Client Profile" />
    <Layout>
        <ClientSideBar>
            <ClientProfile :client="client" />
        </ClientSideBar>
    </Layout>
</template>
