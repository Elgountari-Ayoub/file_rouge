<template>
    <div class="py-4 sm:px-36">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <!-- <form @submit.prevent="form.post(route('coaches.store'), { onSuccess: () => form.reset() })"
                    enctype="multipart/form-data"> -->
                <form @submit.prevent="submit">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <!-- Specialization -->
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="specialization"
                                        class="block text-sm font-medium text-gray-700">Specialization</label>
                                    <input required v-model="form.specialization" type="text" id="specialization"
                                        name="specialization" autocomplete="specialization"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                    <InputError :message="form.errors.specialization" class="mt-2" />

                                </div>
                                <!-- Country -->
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                    <input required v-model="form.country" type="text" id="country" name="country"
                                        autocomplete="country-name"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                </div>
                                <!-- Phone -->
                                <div class="col-span-6 sm:col-span-1">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <input required v-model="form.phone" type="tel" min="10" id="phone" name="phone" autocomplete="phone"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                </div>
                            </div>

                            <!-- Experience -->
                            <div>
                                <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                                <div class="mt-1">
                                    <textarea required v-model="form.experience" id="experience" name="experience" rows="3"
                                        class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="I was a little boy ..." />
                                </div>
                            </div>

                            <!-- Story -->
                            <div>
                                <label for="story" class="block text-sm font-medium text-gray-700">Personal Story </label>
                                <div class="mt-1">
                                    <textarea required v-model="form.story" id="story" name="story" rows="3"
                                        class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="I was a little boy ..." />
                                </div>
                            </div>

                            <!-- Photo -->

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="photo">Upload file</label>
                                <input required @input="form.photo = $event.target.files[0]"
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
    specialization: null,
    country: null,
    phone: null,
    experience: null,
    story: null,
    photo: null,
})

function submit() {
    router.post('/coaches', form, {
        forceFormData: true,
        onSuccess: () => {
            // Handle successful form submission
            console.log(1);
        },
        onError: (errors) => {
            console.log(0);
            console.log(errors);
            // Handle form submission errors
        }
    })
}

</script>
  