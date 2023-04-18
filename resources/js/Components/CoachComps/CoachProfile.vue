<!-- This example requires Tailwind CSS v2.0+ -->
<script setup>
import { PaperClipIcon } from '@heroicons/vue/solid'

import Layout from '@/Layouts/Layout.vue'
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';

import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['coach']);
const form = useForm({
    id: props.coach.id,
    name: props.coach.name,
    email: props.coach.email,
    password: props.coach.password,
    photo: props.coach.photo,
    experience: props.coach.experience,
    story: props.coach.story,
    country: props.coach.country,
    phone: props.coach.phone,
    specialization: props.coach.specialization,
    _method: 'put',
});
const editing_name = ref(false);
const editing_email = ref(false);
const editing_password = ref(false);
const editing_photo = ref(false);
const editing_experience = ref(false);
const editing_story = ref(false);
const editing_country = ref(false);
const editing_phone = ref(false);
const editing_specialization = ref(false);

function showImage() {
            return "/storage/";
        }

</script>
<template >
    <div class="px-8 py-4 ">
        <h3 class="text-lg font-medium leading-6 text-gray-900 ">Coach Information</h3>
        <p class="max-w-2xl mt-1 text-sm text-gray-500">Personal coach information details.</p>
    </div>
    <div class="px-8 mt-5 border-t border-gray-200">
        <dl class="divide-y divide-gray-200">
            <!-- ---------------- NAME-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Full name</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_name"
                        @submit.prevent="form.put(route('coaches.update', props.coach.id), { onSuccess: () => editing_name = false })">
                        <input type="text" class="flex-grow" v-model="form.name">
                        <InputError :message="form.errors.name" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_name = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.name }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_name = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- EMAIL-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Email</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_email"
                        @submit.prevent="form.put(route('coaches.update', props.coach.id), { onSuccess: () => editing_email = false })">
                        <input type="email" class="flex-grow" v-model="form.email">
                        <InputError :message="form.errors.email" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_email = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.email }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_email = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- Password-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Password</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_password"
                        @submit.prevent="form.put(route('coaches.update', props.coach.id), { onSuccess: () => editing_password = false })">
                        <input type="password" class="flex-grow" v-model="form.password">
                        <InputError :message="form.errors.password" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_password = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>

                    <input v-else readonly type="text" placeholder="•••••••••" class="flex-grow border-hidden focus:border-hidden">

                    <!-- <span v-else class="flex-grow">{{ form.password }}</span> -->
                    <!-- <span v-else class="flex-grow">Password</span> -->


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_password = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- Photo-->
            <div class="items-center py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Photo</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_photo"
                        @submit.prevent="form.post(route('coaches.update', props.coach.id), { onSuccess: () => editing_photo = false })">
                        <input type="file" 
                        @input="form.photo = $event.target.files[0]" name="photo"
                        class="flex-grow">
                        <InputError :message="form.errors.photo" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_photo = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>

                    <img v-else
                    :src="showImage() + props.coach.photo"
                    class="w-10" alt="">

                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_photo = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- EXPERIENCE-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Experience</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_experience"
                        @submit.prevent="form.put(route('coaches.update', props.coach.id), { onSuccess: () => editing_experience = false })">
                        <input type="text" class="flex-grow" v-model="form.experience">
                        <InputError :message="form.errors.experience" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_experience = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.experience }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_experience = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>
                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- STORY-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Story</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_story"
                        @submit.prevent="form.put(route('coaches.update', props.coach.id), { onSuccess: () => editing_story = false}, { preserveScroll: true})">
                        <input type="text" class="flex-grow" v-model="form.story">
                        <InputError :message="form.errors.story" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_story = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.story }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_story= true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ----------------COUNTRY-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Country</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_country"
                        @submit.prevent="form.put(route('coaches.update', props.coach.id), { onSuccess: () => editing_country = false })">
                        <input type="text" class="flex-grow" v-model="form.country">
                        <InputError :message="form.errors.country" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_country = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.country }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_country = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- PHON-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Phone</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_phone"
                        @submit.prevent="form.put(route('coaches.update', props.coach.id), { onSuccess: () => editing_phone = false })">
                        <input type="text" class="flex-grow" v-model="form.phone">
                        <InputError :message="form.errors.phone" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_phone = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.phone }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_phone = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- specialization-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Specialization</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_specialization"
                        @submit.prevent="form.put(route('coaches.update', props.coach.id), { onSuccess: () => editing_specialization = false })">
                        <input type="text" class="flex-grow" v-model="form.specialization">
                        <InputError :message="form.errors.specialization" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_specialization = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.specialization }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_specialization = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
        </dl>
    </div>
</template>
  
