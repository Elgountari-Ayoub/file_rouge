<script setup>
import Layout from '@/Layouts/Layout.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import CoachFormComp from '@/Components/CoachComps/CoachFormComp.vue';
import CoachListComp from '@/Components/CoachComps/CoachListComp.vue';
import { onMounted } from 'vue'

const props = defineProps(['coaches']);
onMounted(() => { 
	console.log("Hello World")
    console.log(props);
})


const form = useForm({
    search: null
});

function submit() {
    router.post('/clients', form, {
        forceFormData: true,
        onSuccess: () => {
            // Handle successful form submission
            console.log('client created successfully');
        },
        onError: (errors) => {
            console.log('client didn\'t created successfully');
            console.log(errors);
            // Handle form submission errors
        }
    })
}

</script>

<template>
    <Head title="Coaches Create" />
    <Layout>
        <template #header>
            <!-- Search  -->
            <div class="fixed left-0 w-full pt-1 -mt-10 bg-white">
                <div class="md:col-span-1">
                    <form
                    class="relative z-10 flex items-center m-auto px-52"
                        @submit.prevent="form.get(route('coaches.coachesList'))">
                    <!-- <form class="relative z-10 flex items-center m-auto px-52" @submit.prevent="submit"> -->
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input v-model="form.search" name="search" type="text" id="simple-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 "
                                placeholder="Search">
                        </div>
                        <button type="submit"
                            class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>

                </div>
            </div>
        </template>
        <CoachListComp :coaches="coaches"/>

    </Layout>
</template>
