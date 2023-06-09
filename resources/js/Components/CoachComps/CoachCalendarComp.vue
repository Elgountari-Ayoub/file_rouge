<template>
    <div class="grid gap-4 xl:grid-cols-3 sm:grid-cols-1 md:grid-cols-2 ">
        <div class="col-span-1">
            <VueDatePicker v-model="date" inline auto-apply="true" class="col-span-1 my-4 sm:col-span-2" v />
            <button type="submit"
                class="inline-flex justify-center px-4 py-2 mt-auto text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                @click.prevent="submit">Submit</button>
        </div>
        <ul class="grid grid-cols-1 col-span-2 gap-4 lg:grid-cols-4 md:grid-cols-1 place-content-start">
            <li v-for="item in appointments" :key="item.start_time" class="p-2 text-center rounded-lg "
                @click="item.client_id ? null : updateSelectedDate(item.start_time)"
                :class="{ 'bg-red-500': item.client_id, 'bg-teal-100': !item.client_id }">
                {{ item.start_time }}
            </li>
        </ul>

    </div>

    <p class="mt-4">{{ formattedDate }}</p>
</template>

<script setup>
import { ref } from 'vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
import { router, useForm } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';
import moment from 'moment';
import { watch } from 'vue';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from 'sweetalert2'


const props = defineProps(['appointments', 'userType']);
const date = ref(new Date());
let err_msg = ref(null);

const formattedDate = computed(() => {
    const year = date.value.getFullYear();
    const month = ('0' + (date.value.getMonth() + 1)).slice(-2);
    const day = ('0' + date.value.getDate()).slice(-2);
    const hours = ('0' + date.value.getHours()).slice(-2);
    const minutes = ('0' + date.value.getMinutes()).slice(-2);
    const seconds = ('0' + date.value.getSeconds()).slice(-2);

    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
});

function isTimeAvailable(newStart, newEnd, appointments) {
    const now = new Date();
    now.setMinutes(now.getMinutes() - 1);
    const oneWeekFromNow = new Date(now.getTime() + (7 * 24 * 60 * 60 * 1000));
    const selectedDate = new Date(newStart);
    if (selectedDate < now || selectedDate >= oneWeekFromNow) {
        err_msg = ['outOfRange!', 'Now <= selected Date <= 1 week from now'];
        return false;
    }
    for (let i = 0; i < appointments.length; i++) {
        const start = appointments[i].start_time;
        const end = appointments[i].end_time;

        if ((newStart >= start && newStart < end) ||
            (newEnd > start && newEnd <= end) ||
            (newStart <= start && newEnd >= end)) {
            err_msg = ['Already Exist!', 'Selected date mustn\'t be between added appointment'];
            return false;
        }
    }
    return true;
}

const form =
    useForm({
        start_time: formattedDate.value,
        end_time: moment(formattedDate.value).add(1, 'hours').format('YYYY-MM-DD HH:mm:ss')
    });


watch(formattedDate, (formattedDate) => {
    form.start_time = formattedDate;
    form.end_time = moment(formattedDate.value).add(1, 'hours').format('YYYY-MM-DD HH:mm:ss');
});

function submit() {
    try {
        if (isTimeAvailable(form.start_time, form.end_time, props.appointments)) {
            router.post('appointments', form, {
                forceFormData: true,
                onSuccess: () => {
                    // Handle successful form submission
                    console.log(1);
                },
                onError: (errors) => {
                    // Handle form submission errors
                    console.log(0);
                    console.log(errors);
                }
            })
        } else {

            Swal.fire({
                title: err_msg[0],
                text: err_msg[1],
                icon: "warning",
                buttons: {
                    cancel: "Cancel",
                    confirm: "OK",
                },
            })
        }
    } catch (error) {
        Swal.fire({
            title: err_msg[0],
            text: err_msg[1],
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                confirm: "OK",
            },
        })
    }


}
</script>