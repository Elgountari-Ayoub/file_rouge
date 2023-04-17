<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const user = computed(() => usePage().props.auth.user)
</script>

<template>
  <main>
    <header>

    </header>
    <content>
      <slot />
    </content>
  </main>
</template>