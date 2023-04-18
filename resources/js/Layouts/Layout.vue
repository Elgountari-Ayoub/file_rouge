<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, useForm } from '@inertiajs/vue3';

import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

// const user = computed(() => usePage().props.auth.user)
const user = computed(() => usePage().props.auth);
const canlogg = computed(() => usePage().props);


const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="">
        <div class="relative min-h-screen ">
            <nav class="fixed top-0 left-0 w-full bg-white border-b border-gray-100 mb-52">
                <!-- Primary Navigation Menu -->
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16 ">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex items-center shrink-0">
                                <Link :href="route('/')">
                                <!-- <ApplicationLogo class="block w-auto text-gray-800 fill-current h-9" /> -->
                                <!-- You Coach -->
                                YOU COACH
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink v-if="$page.props.userRole != 'coach'" :href="route('clients.create')"
                                    :active="route().current('clients.create')">
                                    Find a coach
                                </NavLink>
                                <NavLink v-if="$page.props.userRole != 'coach'" :href="route('coaches.create')"
                                    :active="route().current('coaches.create')">
                                    Apply to coach
                                </NavLink>
                                <NavLink v-if="$page.props.userRole == 'coach'" :href="route('coaches.index')"
                                    :active="route().current('coaches.index')">
                                    Dashboard
                                </NavLink>
                                <NavLink v-if="$page.props.userRole == 'client' " :href="route('clients.index')"
                                    :active="route().current('clients.index')">
                                    Dashboard
                                </NavLink>
                            </div> -->

                            <!-- Guest and User Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" v-if="$page.props.userRole == 'user' || $page.props.userRole == 'guest'">
                                <NavLink :href="route('clients.create')"
                                    :active="route().current('clients.create')">
                                    Find a coach
                                </NavLink>
                                <NavLink :href="route('coaches.create')"
                                    :active="route().current('coaches.create')">
                                    Apply to coach
                                </NavLink>
                            </div>

                            <!-- Cleint Links -->

                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" v-if="$page.props.userRole == 'client'">
                                <NavLink :href="route('clients.index')"
                                    :active="route().current('clients.index')">
                                    Dashboard
                                </NavLink>
                            </div>

                            <!-- Coach Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" v-if="$page.props.userRole == 'coach'">
                                <NavLink :href="route('coaches.index')"
                                    :active="route().current('coaches.index')">
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>

                        <div v-if="$page.props.canLogin" class="p-6 text-right sm:fixed sm:top-0 sm:right-0">
                            <template v-if="!$page.props.auth.user">
                                <Link :href="route('login')"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Log in</Link>

                                <Link v-if="!$page.props.auth.user" :href="route('register')"
                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Register</Link>
                            </template>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6" v-if="$page.props.auth.user">
                            <!-- Settings Dropdown -->
                            <div class="relative ml-3">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="flex items-center -mr-2 sm:hidden" v-if="$page.props.auth.user">
                            <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex': !showingNavigationDropdown,
                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex': showingNavigationDropdown,
                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden"
                    v-if="$page.props.auth.user">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('coacheslist')" :active="route().current('dashboard')">
                            Find Coache
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('coaches.create')" :active="route().current('dashboard')">
                            Apply to coach
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="text-base font-medium text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="mt-20 bg-white shadow" v-if="$slots.header">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main >
                <slot/>
            </main>
        </div>
</div></template>
