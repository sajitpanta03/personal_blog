<script setup>
import { RouterView } from 'vue-router'
import NavbarView from '@/views/NavbarView.vue'
</script>

<template>
  <NavbarView />
  <div class="flex justify-center align-middle">
    <RouterView />
  </div>
</template>

