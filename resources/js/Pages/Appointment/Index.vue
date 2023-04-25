<script setup>
import Layout from '@/Layouts/Layout.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import CoachProfile from '@/Components/CoachComps/CoachProfile.vue';
import CoachFormComp from '@/Components/CoachComps/CoachFormComp.vue';
import CoachSideBar from '@/Components/CoachComps/CoachSideBar.vue';
// import CoachCalendarComp from '@/Components/CoachComps/CoachCalendarComp.vue';
import CoachCalendarComp from '@/Components/CoachComps/CoachCalendarComp.vue';
const props = defineProps(['appointments']);
</script>   


<template>
    <Head title="Coach Profile" />
    <Layout>
        <CoachSideBar>
            <CoachCalendarComp :appointments="appointments" />
        </CoachSideBar>
    </Layout>
</template>
