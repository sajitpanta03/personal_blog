<template>
  <header
    class="top-0 fixed left-0 right-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white text-sm py-4 dark:bg-gray-800"
  >
    <nav
      class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between"
      aria-label="Global"
    >
      <a class="flex-none text-xl font-semibold dark:text-white" href="/">Blog</a>
      <div class="flex flex-row items-center gap-5 mt-5 sm:justify-end sm:mt-0 sm:ps-5">
        <RouterLink
          class="font-medium text-blue-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
          to="/"
          >Home</RouterLink
        >
        <RouterLink
          class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
          to="/about"
          >About</RouterLink
        >
        <RouterLink
          v-if="isAuthenticated"
          class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
          to="/logout"
          >Logout</RouterLink
        >
      </div>
    </nav>
  </header>
</template>

<script setup>
import { RouterLink } from 'vue-router';
import { ref, onMounted } from 'vue';

const isAuthenticated = ref(false);

onMounted(() => {
  isAuthenticated.value = localStorage.getItem('authToken') !== null;
});
</script>
