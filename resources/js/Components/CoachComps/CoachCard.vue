<template>
    <!-- {{ props.coach.appointments }} -->
    <div class="bg-gray-100">
        <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="max-w-4xl mx-auto">
                    <div class="grid grid-cols-1 gap-6 text-center">
                        <div class="flex items-center m-auto md:col-span-2">
                            <img :src="showImage() + coach.photo" :alt="coach.name"
                                class="object-cover w-48 rounded-full shadow-lg">
                        </div>
                        <div class="md:col-span-1">
                            <h1 class="mb-4 text-3xl font-bold ">{{ coach.name }}</h1>
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
                    <ul class="grid grid-cols-2 gap-4 m-8 md:grid-cols-4 place-content-center">
                        <li v-for="item in props.coach.appointments" :key="item.start_time" class="p-2 text-center rounded cursor-pointer" @click="item.client_id ? null :  updateSelectedDate(item.start_time)"  :class="{'bg-red-500' : item.client_id, 'bg-teal-100' : !item.client_id}">
                            {{ item.start_time }}
                        </li>
                        <button v-if="props.coach.appointments" type="submit" @click.prevent="submit"
                            class="inline-flex justify-center px-4 py-2 mt-auto text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Reserve</button>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import { router, useForm } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import moment from 'moment';
import { watch } from 'vue';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from 'sweetalert2'


const props = defineProps(['coach', 'appointments']);
function showImage() {
    return "/storage/";
}

const form =
    useForm({
        start_time: null,
        end_time: null
    });

function updateSelectedDate(selectedDate) {
    form.start_time = selectedDate;
    form.end_time = moment(selectedDate).add(1, 'hours').format('YYYY-MM-DD HH:mm:ss')
    console.log(form.start_time);
}
function submit() {
    // return ;
    try {
        if (form.start_time != null && form.end_time != null) {
            router.post('/appointments', form, {
                forceFormData: true,
                onSuccess: () => {
                    console.log(1);
                },
                onError: (errors) => {
                    console.log(0);
                    console.log(errors);
                }
            })
        } else {
            Swal.fire({
                title: 'Oversight',
                text: 'I think you are missing the date selection',
                icon: "warning",
                buttons: {
                    cancel: "Cancel",
                    confirm: "OK",
                },
            })
        }
    } catch (error) {
        Swal.fire({
            title: 'Unexpected',
            text: 'Try refresh tha page',
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                confirm: "OK",
            },
        })
    }


}

</script>
  