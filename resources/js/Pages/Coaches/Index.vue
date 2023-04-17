<script setup>
import Layout from '@/Layouts/Layout.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import CoachFormComp from '@/Components/CoachFormComp.vue';
import CoachProfile from '@/Components/CoacheComps/CoachProfile.vue';
import SideBarLayout from '@/Layouts/SideBarLayout.vue';

const props = defineProps(['coach']);
</script>   


<template>
    <Head title="Coach Profile" />
    <Layout>
        <SideBarLayout>
            <CoachProfile :coach="coach" />
        </SideBarLayout>
    </Layout>
</template>
