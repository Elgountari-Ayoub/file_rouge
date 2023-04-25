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
import ClientSideBar from '@/Components/ClientComps/ClientSideBar.vue';
import ClientAppointmentComp from '@/Components/ClientComps/ClientAppointmentComp.vue'
const props = defineProps(['appointments', 'userType']);
</script>   


<template>
    <Head title="Coach Profile" />
    <Layout>
        <ClientSideBar v-if="props.userType == 'client'">
            <ClientAppointmentComp   :appointments="appointments" :userType="userType"/>
        </ClientSideBar>
        <CoachSideBar v-else>
            <CoachCalendarComp :appointments="appointments" :userType="userType"/>
        </CoachSideBar>
    </Layout>
</template>
