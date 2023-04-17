<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

// const user = computed(() => usePage().props.auth.user)
const user = computed(() => usePage().props.auth);
const canlogg = computed(() => usePage().props);

</script>

<template>
  <main>
    <header>
      <pre>
        {{ $page.props}}
      </pre>
    </header>
    <content>
      <slot />
    </content>
  </main>
</template>