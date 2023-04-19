<script setup>
import Layout from '@/Layouts/Layout.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import CoachProfile from '@/Components/CoachComps/CoachProfile.vue';
import CoachFormComp from '@/Components/CoachComps/CoachFormComp.vue';
import CoachSideBar from '@/Components/CoachComps/CoachSideBar.vue';

const props = defineProps(['coach']);
</script>   


<template>
    <Head title="Coach Profile" />
    <Layout>
        <CoachSideBar>
            <CoachProfile :coach="coach" />
        </CoachSideBar>
    </Layout>
</template>
