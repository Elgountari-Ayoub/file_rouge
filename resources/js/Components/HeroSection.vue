<template>
  <div
    class="relative flex items-center justify-center min-h-screen bg-center bg-cover bg-gradient-to-r from-blue-900 to-purple-900 " style="z-index: -1;">
    <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
      <h1 class="mb-4 text-5xl font-bold text-white">Fitness Coaching</h1>
      <p class="mb-8 text-xl text-gray-300">Get in the best shape of your life with our expert coaching.</p>
      <div class="flex flex-wrap mb-12 -mx-4">
        <div class="w-full px-4 mb-4 sm:w-1/2">
          <div class="p-6 bg-gray-100 rounded-lg">
            <h2 class="mb-2 text-xl font-bold text-black">Personalized Coaching</h2>
            <p class="text-gray-700">Our coaches will work with you one-on-one to create a customized fitness plan that
              fits your goals and lifestyle.</p>
          </div>
        </div>
        <div class="w-full px-4 mb-4 sm:w-1/2">
          <div class="p-6 bg-gray-100 rounded-lg">
            <h2 class="mb-2 text-xl font-bold text-black">Group Workouts</h2>
            <p class="text-gray-700">Join our community of like-minded individuals and work out together in a fun and
              supportive environment.</p>
          </div>
        </div>
      </div>
      <Link :href="route('coaches.create')">
      <button class="px-6 py-3 font-semibold text-white bg-purple-600 rounded-lg">Find A Coach</button>
      </Link>

    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<style>/* Here you can add your custom styles if needed */</style>
