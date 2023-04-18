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

const props = defineProps(['client']);
const form = useForm({
    id: props.client.id,
    name: props.client.name,
    email: props.client.email,
    password: props.client.password,
    photo: props.client.photo,
    gender: props.client.gender,
    height: props.client.height,
    weight: props.client.weight,
    goal: props.client.goal,
    birthday: props.client.birthday,
    _method: 'put',
});
const editing_name = ref(false);
const editing_email = ref(false);
const editing_password = ref(false);
const editing_photo = ref(false);
const editing_gender = ref(false);
const editing_height = ref(false);
const editing_weight = ref(false);
const editing_goal = ref(false);
const editing_birthday = ref(false);

function showImage() {
            return "/storage/";
        }

</script>
<template >
    <div class="px-8 py-4 ">
        <h3 class="text-lg font-medium leading-6 text-gray-900 ">client Information</h3>
        <p class="max-w-2xl mt-1 text-sm text-gray-500">Personal client information details.</p>
    </div>
    <div class="px-8 mt-5 border-t border-gray-200">
        <dl class="divide-y divide-gray-200">
            <!-- ---------------- NAME-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Full name</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_name"
                        @submit.prevent="form.put(route('clients.update', form.id), { onSuccess: () => editing_name = false })">
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
                        @submit.prevent="form.put(route('clients.update', form.id), { onSuccess: () => editing_email = false })">
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
                        @submit.prevent="form.put(route('clients.update', form.id), { onSuccess: () => editing_password = false })">
                        <input type="password" class="flex-grow" v-model="form.password">
                        <InputError :message="form.errors.password" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_password = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>

                    <input v-else type="text" placeholder="•••••••••" class="flex-grow border-hidden focus:border-hidden">

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
                        @submit.prevent="form.post(route('clients.update', form.id), { onSuccess: () => editing_photo = false })">
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
                    :src="showImage() + props.client.photo"
                    class="w-10" alt="">

                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_photo = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- GENDER-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">gender</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_gender"
                        @submit.prevent="form.put(route('clients.update', form.id), { onSuccess: () => editing_gender = false })">
                        <input type="text" class="flex-grow" v-model="form.gender">
                        <InputError :message="form.errors.gender" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_gender = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.gender }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_gender = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>
                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ----------------HEIGHT-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Height</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_height"
                        @submit.prevent="form.put(route('clients.update', form.id), { onSuccess: () => editing_height = false}, { preserveScroll: true})">
                        <input type="number" class="flex-grow" v-model="form.height">
                        <InputError :message="form.errors.height" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_height = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.height }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_height= true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ----------------WEIGHT-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">weight</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_weight"
                        @submit.prevent="form.put(route('clients.update', form.id), { onSuccess: () => editing_weight = false })">
                        <input type="number" class="flex-grow" v-model="form.weight">
                        <InputError :message="form.errors.weight" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_weight = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.weight }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_weight = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- PHON-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Goal</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_goal"
                        @submit.prevent="form.put(route('clients.update', form.id), { onSuccess: () => editing_goal = false })">
                        <input type="text" class="flex-grow" v-model="form.goal">
                        <InputError :message="form.errors.goal" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_goal = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.goal }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_goal = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
            <!-- ---------------- BIRTHDAY-->
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Birthday</dt>
                <dd class="flex justify-between mt-1 text-gray-900 text-tweensm sm:mt-0 sm:col-span-2">
                    <form v-if="editing_birthday"
                        @submit.prevent="form.put(route('clients.update', form.id), { onSuccess: () => editing_birthday = false })">
                        <input type="date" class="flex-grow" v-model="form.birthday">
                        <InputError :message="form.errors.birthday" class="mt-2" />
                        <div class="space-x-2">
                            <PrimaryButton class="mt-4">Save</PrimaryButton>
                            <button class="mt-4" @click="editing_birthday = false; form.reset(); form.clearErrors()">Cancel</button>
                        </div>
                    </form>
                    <span v-else class="flex-grow">{{ form.birthday }}</span>


                    <span class="flex-shrink-0 ml-4">
                        <button type="button" @click="editing_birthday = true"
                            class="font-medium text-indigo-600 bg-white rounded-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </span>

                </dd>
            </div>
            <!-- ---------------- -->
        </dl>
    </div>
</template>
  
