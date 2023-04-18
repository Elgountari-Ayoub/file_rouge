<template>
    <div class="py-4 sm:px-36">
        <div class="md:grid md:grid-cols-1 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-2">
                <!-- <form @submit.prevent="form.post(route('client.store'), { onSuccess: () => form.reset() })"
                    enctype="multipart/form-data"> -->
                <form @submit.prevent="submit">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                            <div class="grid grid-cols-4 gap-6">
                                <!-- gender -->
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                    <input v-model="form.gender" type="text" id="gender" name="gender" autocomplete="gender"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                </div>
                                <!-- height -->
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="height" class="block text-sm font-medium text-gray-700">Height</label>
                                    <input v-model="form.height" type="number" min="2" id="height" name="height"
                                        autocomplete="height-name"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                </div>
                                <!-- weight -->
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                                    <input v-model="form.weight" type="number" min="2" id="weight" name="weight" autocomplete="weight"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                </div>
                                <!-- birhtday -->
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                                    <input v-model="form.birthday" type="date" id="birthday" name="birthday"
                                        autocomplete="birthday"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                </div>
                            </div>
                            <!-- goal -->
                            <div>
                                <label for="goal" class="block text-sm font-medium text-gray-700">Goal</label>
                                <div class="mt-1">
                                    <textarea v-model="form.goal" id="goal" name="goal" rows="3"
                                        class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="Hanma Baki" />
                                </div>
                            </div>


                            <!-- Photo -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="photo">Upload file</label>
                                <input @input="form.photo = $event.target.files[0]"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="photo" name="photo" type="file">
                                <progress v-if="form.progress" :value="form.progress.percentage" max="1000">
                                    {{ form.progress.percentage }}%
                                </progress>
                            </div>

                        </div>
                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <!-- <PrimaryButton class="mt-4">Chirp</PrimaryButton> -->
                            <button type="submit" :disabled="form.processing"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head, router } from '@inertiajs/vue3';
import { reactive } from 'vue';



const form = useForm({
    photo: null,
    gender: null,
    height: null,
    weight: null,
    goal: null,
    birthday: null,

})

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
  