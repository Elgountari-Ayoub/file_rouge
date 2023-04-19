<template>
    <div class="bg-gray-100">
        <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="max-w-4xl mx-auto">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="flex items-center m-auto md:col-span-2">
                            <img :src="showImage() + coach.photo" :alt="coach.name"
                            class="object-cover w-48 rounded-lg shadow-lg"
                            >
                        </div>

                        <div class="md:col-span-1">
                            <h1 class="mb-4 text-3xl font-bold">{{ coach.name }}</h1>
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
                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
const props = defineProps(['coach']);
function showImage() {
  return "/storage/";
}

</script>
  