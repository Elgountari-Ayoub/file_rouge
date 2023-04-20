<template>
  <div class="bg-white ">
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:py-24">
      <div class="space-y-12">
        <ul role="list" class="space-y-12 lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8 lg:gap-y-12 lg:space-y-0">
          <li v-for="coach in coaches" :key="coach.name">
            <Link :href="`/coaches/${coach.id}`">
            <div class="m-auto space-y-4 sm:grid sm:grid-cols-3 sm:gap-6 sm:space-y-0 lg:gap-8">
              <div class="h-0 aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
                <img :src="showImage() + coach.photo" class="object-cover rounded-lg shadow-lg" alt="">
                <div class="aspect-w-3 aspect-h-2">
                </div>
              </div>
              <div class="sm:col-span-2">
                <div class="space-y-4">
                  <div class="space-y-1 text-lg font-medium leading-6">
                    <h3>{{ coach.name }}</h3>
                    <p class="text-indigo-600">{{ coach.specialization }}</p>
                  </div>
                  <div class="text-lg">
                    <p class="text-gray-500">{{ coach.experience }}</p>
                  </div>
                </div>
              </div>
            </div>
            </Link>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
  
<script setup>
import { Link } from '@inertiajs/vue3'
const props = defineProps(['coaches']);


function showImage() {
  return "/storage/";
}
// const coaches = [
//   {
//     name: 'Whitney Francis',
//     role: 'Copywriter',
//     imageUrl:
//       'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80',
//     bio: 'Ultricies massa malesuada viverra cras lobortis. Tempor orci hac ligula dapibus mauris sit ut eu. Eget turpis urna maecenas cras. Nisl dictum.',
//   },
//   // More coaches...
// ]

</script>